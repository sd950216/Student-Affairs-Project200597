<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Doctors;
use App\Models\Courses;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "AddDepartment";
        return view('pages.AddDepartment')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


    $validatedData = $request->validate([
        'name' => 'required|unique:departments|max:10',
        'code' => 'sometimes|required|numeric|unique:departments'
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
            return redirect('/')->with('success', 'Department has been created successfully!');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
