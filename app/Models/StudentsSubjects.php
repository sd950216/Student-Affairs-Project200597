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

    public function registered_students(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Students::class);
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Departments::class);
    }
    public static function GetAbsence($subject)
    {
        return StudentsSubjects::where(['name' => $subject])->get();
    }
    public static function getSubjects($student_id)
    {
        return StudentsSubjects::where(['students_id' => $student_id])->get();
    }

}
