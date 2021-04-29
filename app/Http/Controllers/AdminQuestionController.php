<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\QuestionWithPairs;
use App\Models\QuestionWithAnswers;
use App\Models\OptionWithAnswers;

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
        $question = new QuestionWithAnswers();

        $request->validate([
            'name'=>'required',
        ]);

        $question->name = $request->name;
        $question->type = $request->type;

        if($question->save()){
            if($request->type == 'classical'){
                $option = new OptionWithAnswers();
                $option->question_with_answers_id = $question->id;
                $option->answer = $request->testAnswer;

                if($option->save()){
                    return back()->with('success', 'New question');
                }
            }
            if($request->type == 'selecting'){
                $options = $request->option;

                for($i = 0 ; $i < count($options) ; $i++){
                    $option = new OptionWithAnswers();
                    $option->question_with_answers_id = $question->id;

                    $option->answer = $options[$i];
                    $option->rightness = $request->has('rightness' . ($i + 1)) ? true : false;

                    if(!$option->save()){
                        return back()->with('error', 'Question not created');
                    }
                }
                return back()->with('success', 'New question');
            }

        }
        return back()->with('error', 'Question not created');
    }
    
}
