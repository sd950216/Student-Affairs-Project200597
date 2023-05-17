<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

    protected $fillable = [
        'name',
        'code',
        'department',
        'departments_id',
        'prerequisites',
    ];





    public function departments(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Departments::class);
    }
    public static function getCourses()
    {
        return Courses::all();
    }
    public static function getSpecialization($specialization)
    {

        return Courses::where('name', $specialization)->get();
    }
}


