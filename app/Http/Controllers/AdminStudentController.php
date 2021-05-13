<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Exam;
use App\Models\Teacher;
use App\Models\Question;
use App\Models\StudentExam;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\StudentAnswerPair;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminStudentController extends Controller
{
    function active () {
        $teacher = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        $studentExams = StudentExam::whereNull('end')->get();
        
        return view('admin.student.active')->with($teacher)->with('studentExams', $studentExams);
    }
    
    function finished () {
        $teacher = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        $studentExams = StudentExam::whereNotNull('end')->get();
        
        return view('admin.student.finished')->with($teacher)->with('studentExams', $studentExams);
    }

    function detail($id) {
        $teacher = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        $studentExam = $this->getData($id);

        return view('admin/student/detail')->with($teacher)->with('questions', $studentExam);
    }

    function getData($id){
        $studentExam = StudentExam::find($id);
        $exam = Exam::find($studentExam->exam_id);

        $questions = $exam->questions;
        $questions->student = $studentExam;
        foreach ($questions as $question) {
            if ($question->type == 'pairing') {
                $question->pairs = StudentAnswerPair::where('student_exam_id', $id)->get();
                continue;
            }
/*             if($question->type == 'selecting'){
                $question->options = StudentAnswer::where('student_exam_id', $id)->get();
                continue;
            } */
            $question->answer = StudentAnswer::where('student_exam_id', $id)->where('question_id', $question->id)->first();
        }
        //dd($questions);
        return $questions;
    }
}
