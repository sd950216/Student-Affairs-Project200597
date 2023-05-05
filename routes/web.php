<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/AddDepartment', 'App\Http\Controllers\DepartmentController@index');
Route::post('/storeDepartment', 'App\Http\Controllers\DepartmentController@store')->name('storeDepartment');
Route::get('/AddSubject', 'App\Http\Controllers\SubjectController@index');
Route::post('/storeSubject', 'App\Http\Controllers\SubjectController@store')->name('storeSubject');
Route::get('/CreateStudentAccount', 'App\Http\Controllers\StudentController@index');
Route::post('/storeStudentAccount', 'App\Http\Controllers\StudentController@store')->name('storeStudentAccount');
Route::get('/CreateDoctorAccount', 'App\Http\Controllers\DoctorController@index')->name('controllers.doctor.index');;
Route::post('/storeDoctorAccount', 'App\Http\Controllers\DoctorController@store')->name('storeDoctorAccount');
Route::get('/GenerateAbsence', 'App\Http\Controllers\PagesController@GenerateAbsence');

Route::get('/info/{deparment}', 'App\Http\Controllers\AdminController@index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
