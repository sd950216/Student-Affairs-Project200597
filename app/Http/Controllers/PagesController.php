<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='welcome';
        return view('pages.index')->with('title',$title);
    }

    public function create_department()
    {
        $title = 'create Department';
        return view('pages.create_department')->with('title', $title);
    }
}
