<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminQuestionController;

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
/* Route::get('home', function () {
    return view('home');
}); */

/* Admin */

Route::post('admin/save',[AdminController::class, 'save'])->name('admin.save');
Route::post('admin/check',[AdminController::class, 'check'])->name('admin.check');
Route::get('admin/logout',[AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/registration',[AdminController::class, 'registration'])->name('admin.registration');
Route::get('admin',[AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware'=>['AdminCheck']], function(){
    /* Dashboard */
    Route::get('admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/tests',[AdminController::class, 'tests'])->name('admin.tests');

    /* Exam */ 

    /* Question */
    Route::get('admin/question',[AdminQuestionController::class, 'index'])->name('admin.question');
    Route::get('admin/question/create',[AdminQuestionController::class, 'create'])->name('admin.question.create');
});

/* Exams */
Route::get('/', function () {
    return view('exam/login');
});
Route::get('exam', function () {
    return view('exam/exam');
});

//Route::get('loginform', 'Controller@function');