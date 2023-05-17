<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin routes here
Route::middleware(['auth', 'checkRole:admin'])->group(function () {

    Route::get('/AddDepartment', 'App\Http\Controllers\DepartmentController@index');
    Route::post('/storeDepartment', 'App\Http\Controllers\DepartmentController@store')->name('storeDepartment');
    Route::get('/AddSubject', 'App\Http\Controllers\SubjectController@index');
    Route::post('/storeSubject', 'App\Http\Controllers\SubjectController@store')->name('storeSubject');
    Route::get('/CreateStudentAccount', 'App\Http\Controllers\StudentController@index');
    Route::post('/storeStudentAccount', 'App\Http\Controllers\StudentController@store')->name('storeStudentAccount');
    Route::get('/CreateDoctorAccount', 'App\Http\Controllers\DoctorController@index')->name('controllers.doctor.index');;
    Route::post('/storeDoctorAccount', 'App\Http\Controllers\DoctorController@store')->name('storeDoctorAccount');
    Route::get('/GenerateAbsence/{course}', 'App\Http\Controllers\AdminController@Absence');

});


// Doctor routes here
Route::middleware(['auth', 'checkRole:doctor'])->group(function () {

    Route::get('/GenerateResults/{course}', 'App\Http\Controllers\DoctorController@Results')->middleware('checkRole:doctor');
    Route::get('/upload', 'App\Http\Controllers\FilesController@index')->name('files.index')->middleware('checkRole:doctor');;
    Route::post('/store-files', 'App\Http\Controllers\FilesController@store')->name('files.store')->middleware('checkRole:doctor');;
    Route::post('/updateStatus', 'App\Http\Controllers\AdminController@updateStatus')->name('admin.updateStatus')->middleware('checkRole:doctor');
});


// Student routes here
Route::get('/StudentSubject', 'App\Http\Controllers\StudentsCoursesController@index')->middleware('checkRole:student');
Route::post('/storeStudentSubject', 'App\Http\Controllers\StudentsCoursesController@store')->name('storeStudentSubject');
Route::get('/files/{FileName}', 'App\Http\Controllers\FilesController@download')->name('files.download');


// multi routes here
Route::get('/list/students', 'App\Http\Controllers\AdminController@listStudents');
Route::get('/list/doctors', 'App\Http\Controllers\AdminController@listDoctors');
Route::get('/list/courses', 'App\Http\Controllers\AdminController@listCourses');
Route::get('/list/files', 'App\Http\Controllers\FilesController@show');


// Authentication routes here

require __DIR__.'/auth.php';
