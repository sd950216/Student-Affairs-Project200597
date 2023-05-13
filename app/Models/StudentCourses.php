<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentCourses extends Model
{
    protected $fillable = [
        'name',
        'students_id',
        'department',
        'departments_id',
        'status',
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
        $students = User::select('users.*','student_courses.Department','student_courses.status')
            ->join('student_courses', 'users.id', '=', 'student_courses.students_id')
            ->where('student_courses.name', $subject)
            ->get();
        return $students;


    }

    public static function getSubjects($student_id)
    {
        return StudentCourses::where(['students_id' => $student_id])->get();
    }

}
