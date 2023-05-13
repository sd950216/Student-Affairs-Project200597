<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\StudentCourses;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
        return view('pages.Files');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|JsonResponse
     */
    public function show()
    {

        if (Auth::user()->role == 'student')
        {
            $courses = StudentCourses::getSubjects(Auth::user()->id) ->pluck('name')
                ->toArray();;
            $files = Files::whereIn('course',$courses)->get();
        }

        else
            $files = Files::GetFiles();


        return view('lists.FilesList')->with(['files'=>$files]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    //add image to the storage disk.
    public function uploadImageViaAjax(Request $request)
    {
        $name = [];
        $original_name = [];
        foreach ($request->file('file') as $key => $value) {
            $image = uniqid() . time() . '.' . $value->getClientOriginalExtension();
            $destinationPath = public_path().'/images/';
            $value->move($destinationPath, $image);
            $name[] = $image;
            $original_name[] = $value->getClientOriginalName();
        }

        return response()->json([
            'name'          => $name,
            'original_name' => $original_name
        ]);
    }

//add form data to database
    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        $filePath = $file->storeAs('public/Files', $fileName);
        $destinationPath = public_path().'/Files/';
        $file->move($destinationPath,$fileName);
        Files::create([
            'name' => $fileName,
            'course' => Auth::user()->specialization,
            'doctor' => Auth::user()->name,
            'file_path' => $filePath,
        ]);

        return response()->json(['success' => true]);
    }


    /**
     * Display the specified resource.
     *
     * @param $FileName
     * @return BinaryFileResponse
     */
    public function download($FileName)
    {

        $file_path = public_path('Files/'.$FileName);
        if (file_exists($file_path)) {
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $FileName . '"',
            ];
            return response()->download($file_path, $FileName, $headers);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
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
     * @param Request $request
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
