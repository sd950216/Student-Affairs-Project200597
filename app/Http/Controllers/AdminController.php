<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Students;
use App\Models\StudentsSubjects;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
        if (Auth::user()->role == 'admin') {
            $courses = Courses::getSubjects();

        }
        else if (Auth::user()->role == 'doctor') {
            $courses = Courses::getSpecialization(Auth::user()->specialization);

        }
        else
            $courses = StudentsSubjects::getSubjects(Auth::user()->id);


        return view('lists.CoursesList')->with(['courses'=>$courses]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Absence($course)
    {
//        $students = User::getStudents();
        // Create a new Dompdf instance
        $students_ids = StudentsSubjects::GetAbsence("$course")
            ->pluck('students_id')
            ->toArray()
        ;

        $students = User::whereIn("id", $students_ids)->get();

        $pdf = new Dompdf();

        // Load the blade view with the students data and convert it to HTML
        $html = view('pages.GenerateAbsence', compact('students'))->render();



        // Load the HTML into Dompdf
        $pdf->loadHtml($html);

        // Render the PDF
        $pdf->render();
        // Output the generated PDF to the browser
//        return $pdf->stream($course);
        return response()->json($students);

    }

}
