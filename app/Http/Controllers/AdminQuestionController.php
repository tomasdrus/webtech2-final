<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\Question;
use App\Models\Option;
use App\Models\Pair;

class AdminQuestionController extends Controller
{

    function index () {
        $questions = ['questions'=>DB::table('questions')->get()->all()];
        $teacher = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];

        return view('admin.question.index')->with($teacher)->with($questions);
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
                    return redirect('admin/question')->with('success', 'New question added');
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
                return redirect('admin/question')->with('success', 'New question added');
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
                return redirect('admin/question')->with('success', 'New question added');
            }

        }
        return redirect('admin/question')->with('error', 'Question was not created');
    }
    
}
