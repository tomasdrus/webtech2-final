<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminExamController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\PdfController;

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
    Route::get('admin/pdf/{id}', [PdfController::class, 'showPdf'])->name('admin.pdf.show');
    Route::get('admin/csv/{id}', [CsvController::class, 'generateCsv'])->name('admin.csv.show');

    Route::get('admin/generate/pdf/{id}', [PdfController::class, 'generatePdf'])->name('admin.pdf.generate');
    Route::get('admin/generate/csv', [CsvController::class, 'downloadCsv'])->name('admin.csv.generate');

    /* Student */
    Route::get('admin/student', [AdminStudentController::class, 'active'])->name('admin.student');
    Route::get('admin/student/finished', [AdminStudentController::class, 'finished'])->name('admin.student.finished');
    Route::get('admin/student/detail/{id}', [AdminStudentController::class, 'detail'])->name('admin.student.detail');

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
