<?php

use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\StudentinfoController;
use App\Http\Controllers\SubjectController;
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
    Route::get('settings', 'settings')->name('settings');
    Route::post('settings/basicinfo/update', 'basicInfo')->name('basicinfo.update');
    Route::post('settings/passwordInfo/update', 'passwordInfo')->name('passwordinfo.update');
    Route::post('settings/resetInfo/update', 'resetInfo')->name('resetinfo.update');
});

Route::controller(ReleaseController::class)
    ->prefix('release')
    ->group(function () {
        Route::get('', 'release')->name('release');
        Route::post('release/store', 'store')->name('release.store');
    });

Route::controller(SubjectController::class)->group(function () {
    Route::post('subject/add', 'store')->name('subject.store');
    Route::post('subject/update/{id}', 'update')->name('subject.update');
    Route::get('subject/get', 'get')->name('subject.get');
    Route::get('subject/destroy/{id}', 'destroy')->name('subject.destroy');
});

Route::controller(StudentinfoController::class)->group(function () {
    Route::get('student', 'index')->name('student.get');
    Route::get('data-management/student/{lrn}/edit-info', 'edit')->name('student.edit');
    Route::post('student/add', 'store')->name('studentinfo.store');
    Route::post('student/update/{id}', 'update')->name('studentinfo.update');
    Route::post('student/other-info/add/{lrn}', 'store_other')->name('otherinfo.store');
    Route::get('student/other-info/destroy/{lrn}', 'destroy')->name('studentinfo.destroy');

    Route::get('data-management/student/{lrn}/show', 'show')->name('student.show');
});

Route::controller(RecordController::class)
    ->prefix('data-management')
    ->middleware(['auth'])->group(function () {
        Route::get('student/{lrn}/academics', 'show')->name('record.show');
        Route::get('student/{lrn}/{id}/edit', 'edit')->name('record.edit');
        Route::post('student/store/academic-record', 'store')->name('record.store');
        Route::post('student/update/academic-record/{id}', 'update')->name('record.update');
        Route::get('student/record-list/{lrn}', 'index')->name('academic_record.show');
        Route::get('student/destroy/{id}', 'destroy')->name('record.destroy');
    });
