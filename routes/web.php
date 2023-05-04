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
Route::get('/AddSubject', 'App\Http\Controllers\PagesController@AddSubject');
Route::get('/AddDepartment', 'App\Http\Controllers\PagesController@AddDepartment');
Route::get('/CreateStudentAccount', 'App\Http\Controllers\PagesController@CreateStudentAccount');
Route::post('/storeStudentAccount', 'App\Http\Controllers\PagesController@store')->name('storeStudentAccount');
Route::get('/CreateDoctorAccount', 'App\Http\Controllers\DoctorController@index')->name('createDoctorAccount');;
Route::post('/storeDoctorAccount', 'App\Http\Controllers\PagesController@storeDR')->name('storeDoctorAccount');
Route::get('/GenerateAbsence', 'App\Http\Controllers\PagesController@GenerateAbsence');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
