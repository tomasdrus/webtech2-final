<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Exam;
use App\Models\Question;
use App\Models\StudentExam;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\StudentAnswerPair;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function getData($id)
    {
        $tests = array();
        $student_exams = StudentExam::where('exam_id', '=', $id)->get();

        foreach ($student_exams as $studentExam) {
            $exam = Exam::find($studentExam->exam_id);
    
            $questions = $exam->questions;
            $questions->student = $studentExam;
            foreach ($questions as $question) {
                if ($question->type == 'pairing') {
                    $question->pairs = StudentAnswerPair::where('student_exam_id', $studentExam->id)->get();
                    continue;
                }
                $question->answer = StudentAnswer::where('student_exam_id', $studentExam->id)->where('question_id', $question->id)->first();
            }
            array_push($tests, $questions); 

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
