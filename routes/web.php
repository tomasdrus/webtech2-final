<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/admin',[AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/registration',[AdminController::class, 'registration'])->name('admin.registration');
Route::post('/admin/save',[AdminController::class, 'save'])->name('admin.save');
Route::post('/admin/check',[AdminController::class, 'check'])->name('admin.check');
Route::get('/admin/dashboard',[AdminController::class, 'dashboard']);
Route::get('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout');

Route::get('/', function () {
    return view('test/login');
});
Route::get('test', function () {
    return view('test/home');
});

/* Route::get('admin', function () {
    return view('admin/login');
});
Route::get('registration', function () {
    return view('admin/registration');
})
Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
}); 
*/

//Route::get('loginform', 'Controller@function');