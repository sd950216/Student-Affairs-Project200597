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
     * @return Application|Factory|View
     */
    public function show()
    {

        if (Auth::user()->role == 'student')
        {
            $courses = StudentCourses::getCourses(Auth::user()->id) ->pluck('name')
                ->toArray();;
            $files = Files::whereIn('course',$courses)->get();
        }

        else
            $files = Files::GetFiles();


        return view('lists.FilesList')->with(['files'=>$files]);
    }


    /**
     * Store a file from the request and save its details in the database.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        // Get the file from the request
        $file = $request->file('file');

        // Get the original file name
        $fileName = $file->getClientOriginalName();

        // Store the file in the "public/Files" directory with the original file name
        $filePath = $file->storeAs('public/Files', $fileName);

        // Get the destination path for moving the file
        $destinationPath = public_path().'/Files/';

        // Move the file to the destination path with the original file name
        $file->move($destinationPath, $fileName);

        // Create a new record in the "Files" table with the file details
        Files::create([
            'name' => $fileName,
            'course' => Auth::user()->specialization,
            'doctor' => Auth::user()->name,
            'file_path' => $filePath,
        ]);

        // Return a JSON response indicating success
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
        $file_path = public_path('Files/' . $FileName);
        if (file_exists($file_path)) {
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $FileName . '"',
            ];
            return response()->download($file_path, $FileName, $headers);
        } else {
            abort(404, 'File Not Found.');
        }
    }




}
