<?php

namespace App\Http\Controllers;

use App\Models\Courses;
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
        $students = Auth::user()->role == 'student' ? 1 : User::getDoctors()->count();
        $doctors = Auth::user()->role == 'doctor' ? 1 : User::getDoctors()->count();
        $courses = Auth::user()->role == 'admin' ? Courses::getSubjects()->count() : 1;

        return view('home', ['students' => $students , 'doctors' => $doctors ,'courses' => $courses ]);
    }

}
