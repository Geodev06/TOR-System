<?php

use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

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


Route::controller(Usercontroller::class)->group(function () {
    Route::get('/', 'index');
    Route::get('register', 'showRegister')->name('register');
    Route::post('register/submit', 'userStore')->name('user.store');
    Route::get('login', 'showLogin')->name('login');
    Route::post('user/auth', 'authenticateUser')->name('user.auth');
});

Route::controller(Dashboardcontroller::class)->group(function () {

    Route::get('dashboard', 'index')->name('dashboard');
    Route::post('user/logout', 'logout')->name('logout');

    Route::get('data-management', 'dataManagement')->name('data.management');
    Route::get('data-management/subjects', 'subjectManage')->name('subject.manage');
});
