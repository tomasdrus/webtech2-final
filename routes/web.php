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

Route::post('admin/save', [AdminController::class, 'save'])->name('admin.save');
Route::post('admin/check', [AdminController::class, 'check'])->name('admin.check');
Route::get('admin/registration', [AdminController::class, 'registration'])->name('admin.registration');
Route::get('admin', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['AdminCheck']], function () {
    /* Dashboard */
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    /* Logout */
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    /* Exam */
    Route::get('admin/exam', [AdminExamController::class, 'index'])->name('admin.exam');
    Route::get('admin/exam/create', [AdminExamController::class, 'create'])->name('admin.exam.create');
    Route::post('admin/exam/save', [AdminExamController::class, 'save'])->name('admin.exam.save');
    Route::delete('admin/exam/destroy/{id}', [AdminExamController::class, 'destroy'])->name('admin.exam.destroy');
    Route::patch('admin/exam/update/{id}', [AdminExamController::class, 'update'])->name('admin.exam.update');
    /* Test export */
    Route::get('admin/exam/pdf/{id}', [AdminExamController::class, 'generatePdf'])->name('admin.exam.pdf');
    Route::get('admin/exam/csv/{id}', [AdminExamController::class, 'generateCsv'])->name('admin.exam.csv');

    /* Question */
    Route::get('admin/question', [AdminQuestionController::class, 'index'])->name('admin.question');
    Route::get('admin/question/create', [AdminQuestionController::class, 'create'])->name('admin.question.create');
    Route::post('admin/question/save', [AdminQuestionController::class, 'save'])->name('admin.question.save');
});


/* Exam */
Route::get('/', [ExamController::class, 'login'])->name('exam.login');
Route::post('exam/check', [ExamController::class, 'check'])->name('exam.check');

Route::group(['middleware' => ['ExamCheck']], function () {
    Route::get('exam', [ExamController::class, 'index'])->name('exam');
    Route::post('exam/finish', [ExamController::class, 'finish'])->name('exam.finish');
});
