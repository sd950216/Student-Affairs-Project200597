<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Courses;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //.
        $title = "AddSubject";
        $departments = Departments::all();

        return view('pages.AddSubject')->with('title', $title)->with('departments', $departments);

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
        $department_id = Departments::where('name', $request->get('department'))->first()->id;

        $request->validate([
            'name' => 'required|unique:courses|max:20',
            'code' => 'required|numeric|unique:courses',
            'department' => 'required',
            'prerequisites' => 'required',
        ]);

        try {

            // Attempt to insert the record
            $Course = new Courses([
                'name' => $request->get('name'),
                'code' => $request->get('code'),
                'department' => $request->get('department'),
                'departments_id' => $department_id,
                'prerequisites' => $request->get('prerequisites'),

            ]);


            $Course->save();

            // Redirect the user with a success message
            return redirect('/')->with('success', 'Course has been created successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Catch the exception and display a user-friendly error message
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->withInput()->withErrors([
                    'name' => 'The course name is already taken. Please choose a different name.',
                    'code' => 'The course code is already taken. Please choose a different code.'
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
