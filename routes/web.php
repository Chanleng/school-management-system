<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Database\Seeders\AdminSeeder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PageController::class)->group(function () {
    // Route::get('/admin-dashboard', 'admindasboard');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'studentRegister')->name('studentRegister');
    Route::get('/student-login', 'studentLogin')->name('studentLogin');
    Route::post('/login-submit', 'Login')->name('Login');
    Route::post('/logout-submit', 'Logout')->name('Logout');
    Route::post('/student-register-submit', 'studentRegisterSubmit')->name('studentRegisterSubmit');
});

Route::middleware('auth')->controller(AdminController::class)->group(function () {
    Route::get('/admin-profile', 'adminProfile')->name('adminProfile');
    Route::get('/admin-dashboard', 'pageOverview')->name('pageOverview');
    Route::get('/manage-user', 'manageUser')->name('manageUser');
    Route::get('/manage-students', 'manageStudent')->name('manageStudent');
    Route::get('/manage-teachers', 'manageTeacher')->name('manageTeacher');
    Route::get('/student-pending', 'studentPending')->name('studentPending');
    Route::post('/approve-student/{id}', 'approveStudent');
    Route::post('/create-user', 'createUserSubmit')->name('createUserSubmit');
    Route::get('/departments', 'departments')->name('departments');
});
