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

    function index() {
        $student = StudentExam::where('id', session('StudentExam'))->first();
        $exam = Exam::find($student->exam_id);
        $questions = $exam->questions;

        foreach ($questions as $question) {
            if($question->type == 'drawing' || $question->type == 'mathematical' || $question->type == 'classical'){
                continue;
            }
            if($question->type == 'selecting'){
                $question->options = Option::where('question_id', $question->id)->get();
            }
            if($question->type == 'pairing'){
                $question->pairs = Pair::where('question_id', $question->id)->get();;
            }
        }
        return view('exam/exam')->with('student', $student)->with('questions', $questions);
    }

    function login() {
        if(session()->has('StudentExam')){
            return redirect('exam');
        }
        return view('exam/login');
    }

    function check (Request $request) {
        $request->validate([
            'forename'=>'required',
            'surname'=>'required',
            'ais'=>'required',
            'token'=>'required',
        ]);

        $exam = Exam::where('token', '=', $request->token)->first();
        if(!$exam){
            return back()->with('error', 'Wrong token');
        }

        $studentExam = StudentExam::create([
            'forename' => $request->forename,
            'surname' => $request->surname,
            'ais' => $request->ais,
            'status' => true,
            'start' => now(),
            'exam_id' => $exam->id,
        ]);

        if(!$studentExam->save()){
            return back()->with('error', 'db error');
        }

        $request->session()->put('StudentExam', $studentExam->id);
        return redirect('exam');
    }

    function finish(Request $request){
        $student = StudentExam::where('id', session('StudentExam'))->first();

        foreach($request->all() as $key => $value) {
            if($key == '_token'){
                continue;
            }

            $questions = explode('-', $key);

            if(count($questions) == 1){
                $rightness = Option::where('question_id', $key)->where('rightness', 1)->where('answer', $value)->exists();

                StudentAnswer::create([
                    'answer' => $value,
                    'rightness' => $rightness,
                    'question_id' => $key,
                    'student_exam_id' => $student->id,
                ]);
            }

            if(count($questions) > 1){
                list($option, $answer) = explode('~', $value);
                $rightness = Pair::where('question_id', $key)->where('option', $option)->where('answer', $answer)->exists();
                StudentAnswerPair::create([
                    'option' => $option,
                    'answer' => $answer,
                    'rightness' => $rightness,
                    'question_id' => $questions[1],
                    'student_exam_id' => $student->id,
                ]);
            }
        }

        session()->pull('StudentExam');
        return redirect('/')->with('success', 'Exam finished');
    }
}
