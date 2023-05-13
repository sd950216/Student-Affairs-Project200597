<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Files extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'course',
        'doctor',
    ];

    public static function  GetFiles(){
        return Files::where('course', Auth::user()->specialization)->get();
    }
}
