<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;

class AdminController extends Controller
{
    function login() {
        return view('admin/login');
    }
    function registration() {
        return view('admin/registration');
    }
    function save (Request $request) {
        $request->validate([
            'forename'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:teachers',
            'password'=>'required|min:5|max:15',
            'token'=>'required',
        ]);
        //return $request->input();
        $teacher = new Teacher;
        $teacher->forename = $request->forename;
        $teacher->surname = $request->surname;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->token = $request->token;

        if($teacher->save()){
            return back()->with('success', 'New teacher');
        }
        return back()->with('error', 'Teacher not created');
    }

    function check (Request $request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $teacher_info = Teacher::where('email','=',$request->email)->first();

        if(!$teacher_info){
            return back()->with('error','We do not recognize your email address');
        }
        if(Hash::check($request->password, $teacher_info->password)){
            $request->session()->put('LoggedTeacher', $teacher_info->id);
            return redirect('admin/dashboard');
        }
        return back()->with('error','Incorrect password');
    }
    
    function logout(){
        session()->pull('LoggedTeacher');
        return redirect('/admin');
    }

    function dashboard(){
        $data = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        return view('admin.dashboard', $data);
    }

/*     function tests(){
        $data = ['LoggedTeacherInfo'=>Teacher::where('id','=', session('LoggedTeacher'))->first()];
        return view('admin.profile', $data);
    } */

}
