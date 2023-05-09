<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\StudentsSubjects;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $subjects = Courses::all();
        $title = "CreateAccount";
        return view('pages.AddStudentSubject')->with('title', $title)->with(compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);


        $department = Courses::where('name', $request->get('name'))->first()->department;
        $department_id = Courses::where('name', $request->get('name'))->first()->departments_id;


        $studentsubject = new StudentsSubjects([
            'name' => $request->get('name'),
            'students_id' => Auth::user()->id,
            'department' => $department,
            'departments_id' => $department_id,

        ]);

        $studentsubject->save();

        return redirect('/')->with('success', 'Subject has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentsSubjects  $studentsSubjects
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsSubjects $studentsSubjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentsSubjects  $studentsSubjects
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsSubjects $studentsSubjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentsSubjects  $studentsSubjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentsSubjects $studentsSubjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentsSubjects  $studentsSubjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentsSubjects $studentsSubjects)
    {
        //
    }
}
