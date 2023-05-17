<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\StudentCourses;
use App\Models\Courses;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
    // Get the names of the subjects that the current user is currently taking
        $current_student_subject_names = StudentCourses::getCourses(Auth::user()->id)->pluck('name')->toArray();

    // Get the names of the subjects that the current user has already passed
        $passed_subjects = StudentCourses::GetPassedSubjects(Auth::user()->id)->pluck('name')->toArray();

    // Get all available subjects
        $all_subjects = Courses::all();
        $null = Courses::where('prerequisites',null)->get()->whereNotIn('name', $current_student_subject_names);
    // Filter the available subjects to only include those that are not already being taken by the student and have their prerequisites satisfied.
        $subjects = $all_subjects->whereNotIn('name', $current_student_subject_names)
            ->whereIn('prerequisites', $passed_subjects)->merge($null);

    // If there are no available subjects left after filtering, redirect the user to a page to add a new subject with a corresponding message.
        if ($all_subjects->count()==0){
            return redirect('/AddSubject')->with('message', 'Please add subject first.');
        }

    // Set the title of the page and render the "AddStudentSubject" view, passing the filtered subjects to it.
        $title = "CreateAccount";
        return view('pages.AddStudentSubject')->with('title', $title)->with(compact('subjects'));
//        return response()->json($null);

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
