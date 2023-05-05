<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Students;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "index";
        return view('pages.index')->with('title', $title);
    }

    public function AddDepartment()
    {

    }
    public function AddSubject()
    {

    }


    public function GenerateAbsence()
    {
        $title = "GenerateAbsence";
        return view('pages.CreateDoctorAccount')->with('title', $title);
    }

}
