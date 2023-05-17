<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Departments;
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

        if (Auth::user()->role == 'admin') {
            $students = User::getStudents()->count();
            $doctors = User::getDoctors()->count();
            $courses = Courses::getSubjects()->count();

           $notes = $this->GetNotes();

        } else if (Auth::user()->role == 'doctor') {
            $students = User::GetDoctorStudents()->count();
            $doctors = 1;
            $courses = 1;
            $notes = null;
        } else {
            $students = 1;
            $doctors = User::getStudentDoctors()->count();
            $courses = StudentCourses::getSubjects(Auth::user()->id)->count();
            $notes = null;

        }

        return view('home', ['students' => $students, 'doctors' => $doctors, 'courses' => $courses , 'notes' => $notes]);

    }
    public function GetNotes(){
        $notices = [];

        $students = User::getStudents()->count();
        $doctors = User::getDoctors()->count();
        $courses = Courses::getSubjects()->count();
        $departments = Departments::all()->count();

        if ($students == 0) {
            $notices[] = "You didn't add any students.";
        }

        if ($doctors == 0) {
            $notices[] = "You didn't add any doctors.";
        }
        if ($courses == 0) {
            $notices[] = "You didn't add any courses.";
        }
        if ($departments == 0) {
            $notices[] = "You didn't add any departments.";
        }
        return $notices;


    }

}
