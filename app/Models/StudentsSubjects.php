<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsSubjects extends Model
{
    protected $fillable = [
        'name',
        'students_id',
        'department',
        'departments_id',
    ];

    public function registered_students()
    {
        return $this->belongsToMany(Students::class);
    }

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }



}
