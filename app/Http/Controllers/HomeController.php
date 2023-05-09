<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()

    {

//        $classCount = $this->schoolClassRepository->getAllBySession($current_school_session_id)->count();

        $students = User::getStudents()->count();
        $doctors = User::getDoctors()->count();
        $courses = Courses::getSubjects()->count();


//        $teacherCount = $this->userRepository->getAllTeachers()->count();
        return view('home', ['students' => $students , 'doctors' => $doctors ,'courses' => $courses ]);

    }
}
