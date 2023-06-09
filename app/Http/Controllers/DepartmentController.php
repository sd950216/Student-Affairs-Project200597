<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $title = "AddDepartment";
        return view('pages.AddDepartment')->with('title', $title);
    }

    public function store(Request $request)
    {


    $request->validate([
        'name' => 'required|unique:departments|max:10',
        'code' => 'required|numeric|unique:departments'
        // other validation rules for your form fields
    ]);

        try {
            // Attempt to insert the record

            $Department = new Departments([
                'name' => $request->get('name'),
                'code' => $request->get('code'),

            ]);
            $Department->save();

            // Redirect the user with a success message
            return redirect('/home')->with('success', 'Department has been created successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Catch the exception and display a user-friendly error message
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->withInput()->withErrors(['name' => 'The department name is already taken. Please choose a different name.',
                    'code' => 'The department code is already taken. Please choose a different code.'
                ]);
            }

            // If the exception is not a duplicate key error, re-throw it
            throw $e;
        }



    }

}
