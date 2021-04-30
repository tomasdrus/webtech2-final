<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Question;
use App\Models\Option;
use App\Models\Pair;

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
        $question = new Question();

        $request->validate([
            'name'=>'required',
        ]);

        $question->name = $request->name;
        $question->type = $request->type;

        if($question->save()){
            if($request->type == 'classical'){
                $option = new Option();
                $option->question_id = $question->id;
                $option->answer = $request->answer;
                $option->rightness = true;

                if($option->save()){
                    return back()->with('success', 'New question');
                }
            }

            if($request->type == 'selecting'){
                $options = $request->options;

                for($i = 0 ; $i < count($options) ; $i++){
                    $option = new Option();
                    $option->question_id = $question->id;

                    $option->answer = $options[$i];
                    $option->rightness = $request->has('rightness' . ($i + 1)) ? true : false;

                    if(!$option->save()){
                        return back()->with('error', 'Question not created');
                    }
                }
                return back()->with('success', 'New question');
            }

            if($request->type == 'pairing'){
                $options = $request->pairOptions;
                $answers = $request->pairAnswers;

                for($i = 0 ; $i < count($options) ; $i++){
                    $pair = new Pair();
                    $pair->question_id = $question->id;
                    $pair->option = $options[$i];
                    $pair->answer = $answers[$i];

                    if(!$pair->save()){
                        return back()->with('error', 'Question not created');
                    }
                }
                return back()->with('success', 'New question');
            }

        }
        return back()->with('error', 'Question not created');
    }
    
}
