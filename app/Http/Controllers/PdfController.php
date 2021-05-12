<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudentAnswer;
use App\Models\StudentAnswerPair;
use App\Models\StudentExam;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use stdClass;

class PdfController extends Controller
{
    public function getData($id)
    {
        $tests = array();
        $student_exams = StudentExam::where('exam_id', '=', $id)->get();

        foreach ($student_exams as $student_exam) {
            $test = new stdClass();
            $test->ais = $student_exam->ais;

            $questions_with_answers = array();
            $answers = StudentAnswer::where('student_exam_id', '=', $student_exam->id)->get();

            foreach ($answers as $answer) {
                $question = Question::select('name')->where('id', '=', $answer->question_id)->get()->first();
                $question_with_answer = new stdClass();
                $question_with_answer->question = $question->name;
                $question_with_answer->answer = $answer->answer;
                array_push($questions_with_answers, $question_with_answer);
            }

            $pair_answers = StudentAnswerPair::where('student_exam_id', '=', $student_exam->id)->get();

            foreach ($pair_answers as $pair_answer) {
                $pair_question = Question::select('name')->where('id', '=', $pair_answer->question_id)->get()->first();
                $pair_question_with_answer = new stdClass();
                $pair_question_with_answer->question = $pair_question->name;
                $pair_question_with_answer->answer = $pair_answer->option . ': ' . $pair_answer->answer;
                array_push($questions_with_answers, $pair_question_with_answer);
            }
            $test->questions_with_answers = $questions_with_answers;
            // dd($test->question_with_answers);
            array_push($tests, $test);
        }
        return $tests;
    }

    public function showPdf($id)
    {
        $tests = $this->getData($id);

        if (sizeof($tests) == 0) {
            return view('admin.pdf.empty');
        }

        return view('admin.pdf.index')->with('tests', $tests)->with('id', $id);
    }

    function generatePdf($id)
    {
        $tests = $this->getData($id);

        view()->share('tests', $tests);
        $pdf = PDF::loadView('admin.pdf.index', $tests);

        return $pdf->download('results.pdf');
    }
}
