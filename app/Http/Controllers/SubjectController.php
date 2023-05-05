<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Subjects;
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
        return view('pages.AddSubject')->with('title', $title);

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
        //
        //
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'department' => 'required',
            'prerequisites' => 'required',
        ]);
        $department_id = Departments::where('name', $request->get('department'))->first()->id;
        $Subject = new Subjects([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'department' => $request->get('department'),
            'departments_id' => $department_id,
            'prerequisites' => $request->get('prerequisites'),

        ]);

        $Subject->save();

        return redirect('/')->with('success', 'Subject has been created successfully!');
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
