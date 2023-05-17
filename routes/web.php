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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'role:admin'])->group(function () {

    // add more routes here
    Route::get('/AddDepartment', 'App\Http\Controllers\DepartmentController@index');
    Route::post('/storeDepartment', 'App\Http\Controllers\DepartmentController@store')->name('storeDepartment');
    Route::get('/AddSubject', 'App\Http\Controllers\SubjectController@index');
    Route::post('/storeSubject', 'App\Http\Controllers\SubjectController@store')->name('storeSubject');
    Route::get('/CreateStudentAccount', 'App\Http\Controllers\StudentController@index');
    Route::post('/storeStudentAccount', 'App\Http\Controllers\StudentController@store')->name('storeStudentAccount');
    Route::get('/CreateDoctorAccount', 'App\Http\Controllers\DoctorController@index')->name('controllers.doctor.index');;
    Route::post('/storeDoctorAccount', 'App\Http\Controllers\DoctorController@store')->name('storeDoctorAccount');
});


Route::get('/GenerateAbsence/{course}', 'App\Http\Controllers\DoctorController@Absence')->middleware('checkRole:doctor');

Route::get('/list/students', 'App\Http\Controllers\AdminController@listStudents');
Route::get('/list/doctors', 'App\Http\Controllers\AdminController@listDoctors');
Route::get('/list/courses', 'App\Http\Controllers\AdminController@listCourses');

Route::get('/StudentSubject', 'App\Http\Controllers\StudentsCoursesController@index')->middleware('checkRole:student');
Route::post('/storeStudentSubject', 'App\Http\Controllers\StudentsCoursesController@store')->name('storeStudentSubject');
Route::post('/updateStatus', 'App\Http\Controllers\AdminController@updateStatus')->name('admin.updateStatus')->middleware('checkRole:doctor');

//Route::get('/secret/{api_key}', 'App\Http\Controllers\ApiController@get')->name('api');
Route::get('/upload', 'App\Http\Controllers\FilesController@index')->name('files.index')->middleware('checkRole:doctor');;
Route::post('/store-files', 'App\Http\Controllers\FilesController@store')->name('files.store')->middleware('checkRole:doctor,student');;
Route::get('/files/{FileName}', 'App\Http\Controllers\FilesController@download')->name('files.download');
Route::get('/list/files', 'App\Http\Controllers\FilesController@show');

require __DIR__.'/auth.php';
