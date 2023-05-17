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


    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Departments::class);
    }
    public static function GetRegisteredStudents($course)
    {
        $students = User::select('users.*','student_courses.Department')
            ->join('student_courses', 'users.id', '=', 'student_courses.students_id')
            ->where('student_courses.name', $course)
            ->get();
        return $students;


    }
    public static function GetResults($course)
    {
        $students = User::select('users.*','student_courses.Department','student_courses.status')
            ->join('student_courses', 'users.id', '=', 'student_courses.students_id')
            ->where('student_courses.name', $course)
            ->get();
        return $students;


    }

    public static function getCourses($student_id)
    {
        return StudentCourses::where(['students_id' => $student_id])->get();
    }
    public static function GetPassedSubjects($student_id)
    {
        return StudentCourses::where(['students_id' => $student_id, 'status' => 'succeeded'])->get();
    }

}
