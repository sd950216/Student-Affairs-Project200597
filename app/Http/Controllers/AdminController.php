<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Students;
use App\Models\StudentsSubjects;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($deparment)

    {

        $department_id = Departments::where('name',$deparment)->first()->id;
        $department = Departments::find($department_id);
        $subjects = $department->subjects;

        return response()->json($subjects);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function GenerateAbsence($subject)
    {

        $stud_name = StudentsSubjects::where('name', $subject)->get();
        $ids = array();
        $names = array();

        foreach ($stud_name as $student) {
            $id = $student->id;
            $ids[] = $id;
        }

        $students = Students::whereIn('id', $ids)->get(['username']);

        foreach ($students as $student) {
            $name = $student->username;
            $names[] = $name;
        }

// $names array now contains the names of all students


        return response()->json($names);
    }



    public function listDoctors()
    {
        $doctors = User::getDoctors();
        return view('lists.DoctorList')->with(['doctors'=>$doctors]);

    }
    public function listStudents()
    {
        $students = User::getStudents();
        return view('lists.studentList')->with(['students'=>$students]);
//        return response()->json($students);

    }

    public function listCourses()
    {
        $Subjects = Courses::getSubjects();
        return view('lists.CoursesList')->with(['courses'=>$Subjects]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
