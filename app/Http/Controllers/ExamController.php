<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Pair;
use App\Models\Option;
use App\Models\Question;
use App\Models\StudentExam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\StudentAnswerPair;

class ExamController extends Controller
{

    function index()
    {
        $student = StudentExam::where('id', session('StudentExam'))->first();
        $exam = Exam::find($student->exam_id);

        $questions = $exam->questions;
        foreach ($questions as $question) {
            if ($question->type == 'drawing' || $question->type == 'mathematical' || $question->type == 'classical') {
                continue;
            }
            if ($question->type == 'selecting') {
                $question->options = Option::where('question_id', $question->id)->get();
            }
            if ($question->type == 'pairing') {
                $question->pairs = Pair::where('question_id', $question->id)->get();;
            }
        }
        return view('exam/exam')->with('student', $student)->with('questions', $questions)->with('exam', $exam);
    }

    function login()
    {
        if (session()->has('StudentExam')) {
            return redirect('exam');
        }
        return view('exam/login');
    }

    function check(Request $request)
    {
        $request->validate([
            'forename' => 'required',
            'surname' => 'required',
            'ais' => 'required',
            'token' => 'required|exists:exams',
        ]);

        $exam = Exam::where('token', $request->token)->where('active', 1)->first();
        if(!$exam){
            return back()->with('error', 'Exam is not activated')->withInput();
        }

        $studentExam = StudentExam::create([
            'forename' => $request->forename,
            'surname' => $request->surname,
            'ais' => $request->ais,
            'status' => true,
            'start' => now('Europe/Bratislava'),
            'exam_id' => $exam->id,
        ]);


        if (!$studentExam->save()) {
            return back()->with('error', 'DB error');
        }

        $request->session()->put('StudentExam', $studentExam->id);
        return redirect('exam');
    }


    function finish(Request $request)
    {
        $studentExam = StudentExam::where('id', session('StudentExam'))->first();
        $studentExam->end = now('Europe/Bratislava');
        $studentExam->save();

        foreach ($request->all() as $key => $value) {
            if ($key == '_token') {
                continue;
            }

            $questions = explode('-', $key);

            if (count($questions) == 1) {
                $rightness = Option::where('question_id', $key)->where('rightness', 1)->where('answer', $value)->exists();

                StudentAnswer::create([
                    'answer' => $value,
                    'rightness' => $rightness,
                    'question_id' => $key,
                    'student_exam_id' => $studentExam->id,
                ]);
            }


            if (count($questions) > 1) {
                list($option, $answer) = explode('~', $value);
                $rightness = Pair::where('question_id', $key)->where('option', $option)->where('answer', $answer)->exists();
                StudentAnswerPair::create([
                    'option' => $option,
                    'answer' => $answer,
                    'rightness' => $rightness,
                    'question_id' => $questions[0],
                    'student_exam_id' => $studentExam->id,
                ]);
            }
        }

        session()->pull('StudentExam');
        session_start();
        session_destroy();
        return redirect('/')->with('success', 'Exam finished');
    }
}
