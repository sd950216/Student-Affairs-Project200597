<?php

namespace App\Http\Controllers;

use App\Models\StudentCourses;
use Dompdf\Dompdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        //
        $title = "CreateAccount";
        return view('pages.CreateDoctorAccount')->with('title', $title);
    }

    public function Results($course)
    {

        $students = StudentCourses::GetResults($course);

        $pdf = new Dompdf();

        // Load the blade view with the students data and convert it to HTML
        $html = view('pages.GenerateResults', compact('students'))->render();



        // Load the HTML into Dompdf
        $pdf->loadHtml($html);

        // Render the PDF
        $pdf->render();
        // Output the generated PDF to the browser
        $pdf->stream($course);
        exit(); // Ensure the script stops executing after streaming the PDF

    }

}
