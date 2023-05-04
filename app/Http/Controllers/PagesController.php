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
        $title = "AddDepartment";
        return view('pages.AddDepartment')->with('title', $title);
    }
    public function AddSubject()
    {
        $title = "AddSubject";
        return view('pages.AddSubject')->with('title', $title);
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'AdNumber' => 'required',
        ]);
        $hashed_password = password_hash($request->get('password'), PASSWORD_DEFAULT);

        $student = new Students([
            'username' => $request->get('username'),
            'password' => $hashed_password,
            'AdNumber' => $request->get('AdNumber'),

        ]);

        $student->save();

        return redirect('/')->with('success', 'Post has been created successfully!');
    }

    public function CreateDoctorAccount()
    {
        $title = "CreateAccount";
        return view('pages.CreateDoctorAccount')->with('title', $title);
    }
    public function storeDR(Request $request)
    {
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

        return redirect('/')->with('success', 'Post has been created successfully!');
    }
    public function GenerateAbsence()
    {
        $title = "GenerateAbsence";
        return view('pages.CreateDoctorAccount')->with('title', $title);
    }

}
