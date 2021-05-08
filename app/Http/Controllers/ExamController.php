<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\StudentExam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    function index() {
        $student = StudentExam::where('id','=', session('StudentExam'))->first();
        $questions = ExamQuestion::find(1)->questions;
        
        //$questions[0]->novinka = 'samo';
        dd($questions[0]->novinka);
        foreach ($questions as $question) {
            if($question->type == 'drawing' || $question->type == 'mathematical' || $question->type == 'classical'){
                continue;
            }
            if($question->type == 'selecting'){
                //$option = Option::find()
                //$question->options = [];
            }
            if($question->type == 'pairing'){
                $question->oairs = [];
            }
        }
        /* 
        [
            {id, name, type}
            {id, name, type, [answer, rigthness]}
            {id, name, type, [option, rigthness]}
        ]
        */

        $student = ['student'=>$student];
        return view('exam/exam')->with($student);
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

    function finish(){
        session()->pull('StudentExam');
        return redirect('/');
    }
}
