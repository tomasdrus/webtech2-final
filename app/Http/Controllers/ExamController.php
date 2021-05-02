<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentExam;
use App\Models\Exam;
use App\Models\ExamQuestion;

class ExamController extends Controller
{
    function login() {
        return view('exam/login');
    }

    function index() {
        return view('exam/exam');
    }

    function check (Request $request) {
        $request->validate([
            'forename'=>'required',
            'surname'=>'required',
            'ais'=>'required',
            'token'=>'required',
        ]);

        //$exam = DB::table('exams')->where('token', $request->token.trim())->first();
        $exam = Exam::where('token', '=', $request->token)->first();
        if(!$exam){
            return back()->with('error', 'Wrong token');
        }

        $student = new StudentExam;
        $student->forename = $request->forename;
        $student->surname = $request->surname;
        $student->ais = $request->ais;
        $student->status = true;
        $student->start = now();
        $student->exam_id = $exam->id;

        if($student->save()){
            //session()->push('Exam', $exam);
            return redirect('exam');
        }
        return back()->with('error', 'db error');
    }

    function finish(){
        session()->pull('Loggedstudent');
        return redirect('/');
    }
}
