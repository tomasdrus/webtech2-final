<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Support\Facades\DB;

class AdminExamController extends Controller
{
    
    function index () {
        $exams = ['exams'=>DB::table('exams')->get()->all()];
        $teacher = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        
        return view('admin.exam.index')->with($teacher)->with($exams);
    }

    function create () {
        $questions = ['questions'=>DB::table('questions')->get()->all()];
        $teacher = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];

        return view('admin.exam.create')->with($teacher)->with($questions);
    }

    function save(Request $request){   
        $exam = new Exam();

        $request->validate([
            'name'=>'required',
            'token'=>'required',
            'length'=>'required',
        ]);

        $exam->name = $request->name;
        $exam->token = $request->token;
        $exam->length = $request->length;
        $exam->active = false;

        if($exam->save()){
            $questions = $request->questions;

            for($i = 0 ; $i < count($questions) ; $i++){
                $exam_question = new ExamQuestion();

                $exam_question->exam_id = $exam->id;
                $exam_question->question_id = $questions[$i];

                if(!$exam_question->save()){
                    return back()->with('error', 'Question not created');
                }
            }
            return back()->with('success', 'New question');
        }
        return back()->with('error', 'Question not created');
    }
}
