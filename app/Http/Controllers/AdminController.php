<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\StudentCourses;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
     * @return JsonResponse
     */
    public function index($deparment)

    {

        $department_id = Departments::where('name',$deparment)->first()->id;
        $department = Departments::find($department_id);
        $subjects = $department->subjects;

        return response()->json($subjects);

    }

    /**
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */

    public function listDoctors()
    {
        if (Auth::user()->role == 'admin')
            $doctors = User::getDoctors();
        else if (Auth::user()->role == 'doctor')
            $doctors = User::GetOneDoctor();
        else
            $doctors = User::GetStudentDoctors();


        return view('lists.DoctorList')->with(['doctors'=>$doctors]);

    }
    public function listStudents()
    {
        if (Auth::user()->role == 'doctor')
            $students = User::GetDoctorStudents();
        else if (Auth::user()->role == 'student')
            $students = User::getCurrentStudent();
        else
            $students = User::getStudents();


        return view('lists.studentList')->with(['students'=>$students]);
    }

    public function listCourses()
    {
        if (Auth::user()->role == 'admin') {
            $courses = Courses::getCourses();

        }
        else if (Auth::user()->role == 'doctor') {
            $courses = Courses::getSpecialization(Auth::user()->specialization);

        }
        else
            $courses = StudentCourses::getCourses(Auth::user()->id);


        return view('lists.CoursesList')->with(['courses'=>$courses]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function updateStatus(Request $request)
    {
        $checkedItems = $request->input('items', []);

        $students = StudentCourses::whereIn('students_id', $checkedItems)->get();
        if ($request->has('Succeeded')) {
            // Handle form submission for submit1
            foreach ($students as $student) {
                $student->update(['status' => 'Succeeded']);
            }
        }
        else {
            // Handle form submission for submit1
            foreach ($students as $student) {
                $student->update(['status' => 'Failed']);
            }
        }
        return redirect()->back();
//        return response()->json($checkedItems);
    }
    public function Absence($course)
    {

        $students = StudentCourses::GetAbsence($course);

        $pdf = new Dompdf();

        // Load the blade view with the students data and convert it to HTML
        $html = view('pages.GenerateAbsence', compact('students'))->render();



        // Load the HTML into Dompdf
        $pdf->loadHtml($html);

        // Render the PDF
        $pdf->render();
        // Output the generated PDF to the browser
        $pdf->stream($course);
        exit(); // Ensure the script stops executing after streaming the PDF

    }
}
