<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AdminExamController;
use App\Http\Controllers\ExamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Admin */
Route::post('admin/save',[AdminController::class, 'save'])->name('admin.save');
Route::post('admin/check',[AdminController::class, 'check'])->name('admin.check');
Route::get('admin/logout',[AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/registration',[AdminController::class, 'registration'])->name('admin.registration');
Route::get('admin',[AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware'=>['AdminCheck']], function(){
    /* Dashboard */
    Route::get('admin/dashboard',[AdminExamController::class, 'dashboard'])->name('admin.dashboard');

    /* Exam */ 
    Route::get('admin/exam',[AdminExamController::class, 'index'])->name('admin.exam');
    Route::get('admin/exam/create',[AdminExamController::class, 'create'])->name('admin.exam.create');
    Route::post('admin/exam/save',[AdminExamController::class, 'save'])->name('admin.exam.save');

    /* Question */
    Route::get('admin/question',[AdminQuestionController::class, 'index'])->name('admin.question');
    Route::get('admin/question/create',[AdminQuestionController::class, 'create'])->name('admin.question.create');
    Route::post('admin/question/save',[AdminQuestionController::class, 'save'])->name('admin.question.save');
});


/* Exam */

Route::get('/',[ExamController::class, 'login'])->name('exam.login');
Route::post('exam/check',[ExamController::class, 'check'])->name('exam.check');

Route::group(['middleware'=>['AdminCheck']], function(){
    /* Exam */ 
    Route::get('exam',[ExamController::class, 'index'])->name('exam.exam');
});


/* Route::get('/', function () {
    return view('exam/login');
}); */
/* 
Route::get('exam', function () {
    return view('exam/exam');
}); */
