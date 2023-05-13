<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\StudentCourses;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Renderable
     */
    public function index()
    {

        if (Auth::user()->role == 'Admin') {
            $students = User::getStudents()->count();
            $doctors = User::getDoctors()->count();
            $courses = Courses::getSubjects()->count();
        } else if (Auth::user()->role == 'doctor') {
            $students = User::GetDoctorStudents()->count();
            $doctors = 1;
            $courses = 1;
        } else {
            $students = 1;
            $doctors = User::getStudentDoctors()->count();
            $courses = StudentCourses::getSubjects(Auth::user()->id)->count();
        }

        return view('home', ['students' => $students, 'doctors' => $doctors, 'courses' => $courses]);

    }

}
