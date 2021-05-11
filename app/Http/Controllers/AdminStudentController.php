<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\StudentExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
