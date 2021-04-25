<?php

namespace App\Http\Controllers;

use App\Models\QuestionWithAnswers;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\QuestionWithPairs;

class AdminQuestionController extends Controller
{

    function index () {
        $data = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        return view('admin.question.index', $data);
    }

    function create () {
        $data = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        return view('admin.question.create', $data);
    }
    function save(Request $request){   
     

        if($request->type == 'classical'){
            $request->validate([
                'name'=>'required',
                // 'answer'=>'required',
            ]);
            $question = new QuestionWithAnswers();
            $question->name = $request->name;
            // $question->answer = $request->answer;
            $question->type = $request->type;
        }
        
        if($question->save()){
            return back()->with('success', 'New question');
        }
        return back()->with('error', 'Question not created');
    }
    
}
