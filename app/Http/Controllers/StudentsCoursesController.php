<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\StudentCourses;
use App\Models\Courses;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
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
        if (Courses::all()->count()==0){
            return redirect('/AddSubject')->with('message', 'Please add subject first.');
        }
        // Get the names of the subjects that the current user is currently taking
        $current_student_subject_names = StudentCourses::getCourses(Auth::user()->id)->pluck('name')->toArray();
        // Get all available subjects
        $all_subjects = Courses::all();
        // If there are no available subjects left after filtering, redirect the user to a page to add a new subject with a corresponding message.
        // Get the names of the subjects that the current user has already passed
        $passed_subjects = StudentCourses::GetPassedSubjects(Auth::user()->id)->pluck('name')->toArray();
        // Get the names of the subjects that has null prerequisites
        $null_prerequisites_courses = Courses::where('prerequisites',null)->get();
        // Filter the available subjects to only include those that are not already being taken by the student and have their prerequisites satisfied.
        $subjects = $all_subjects->whereIn('prerequisites', $passed_subjects)->merge($null_prerequisites_courses)
            ->whereNotIn('name', $current_student_subject_names);
        // render the "AddStudentSubject" view, passing the filtered subjects to it.
        return view('pages.AddStudentSubject')->with(compact('subjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
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

        return redirect('/home')->with('success', 'Subject has been created successfully!');
    }


}
