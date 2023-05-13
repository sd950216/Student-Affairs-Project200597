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
     * @return Application|Factory|View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $currrent_student_subject_names = StudentCourses::getSubjects(Auth::user()->id)->pluck('name')->toArray();
        $passed_subjects = StudentCourses::GetPassedSubjects(Auth::user()->id)->pluck('name')->toArray();
        $all_subjects = Courses::all();
        $subjects = $all_subjects->whereNotIn('name', $currrent_student_subject_names)
            ->whereIn('prerequisites', $passed_subjects);

        if ($all_subjects->count()==0){
            return redirect('/AddSubject')->with('message', 'Please add subject first.');
        }
        $title = "CreateAccount";
        return view('pages.AddStudentSubject')->with('title', $title)->with(compact('subjects'));
//        return response()->json($filtered_subjects);
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
