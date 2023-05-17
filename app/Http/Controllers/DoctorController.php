<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\StudentCourses;
use Dompdf\Dompdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "CreateAccount";
        return view('pages.CreateDoctorAccount')->with('title', $title);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $hashed_password = password_hash($request->get('password'), PASSWORD_DEFAULT);

        $doctor = new Doctors([
            'name' => $request->get('name'),
            'password' => $hashed_password,

        ]);

        $doctor->save();

        return redirect('/')->with('success', 'Doctor has been created successfully!');
    }


}
