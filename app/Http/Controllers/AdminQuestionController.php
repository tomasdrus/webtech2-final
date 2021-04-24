<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

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
}
