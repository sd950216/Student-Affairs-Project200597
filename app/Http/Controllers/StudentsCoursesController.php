<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\StudentCourses;
use App\Models\Courses;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
        //
        $subjects = Courses::all();
        if ($subjects->count()==0){
            return redirect('/AddSubject')->with('message', 'Please add subject first.');
        }
        $title = "CreateAccount";
        return view('pages.AddStudentSubject')->with('title', $title)->with(compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);


        $department = Courses::where('name', $request->get('name'))->first()->department;
        $department_id = Courses::where('name', $request->get('name'))->first()->departments_id;


        $studentCourse = new StudentCourses([
            'name' => $request->get('name'),
            'students_id' => Auth::user()->id,
            'department' => $department,
            'departments_id' => $department_id,
            'status' => 'pending',

        ]);

        $studentCourse->save();

        return redirect('/')->with('success', 'Subject has been created successfully!');
    }


}
