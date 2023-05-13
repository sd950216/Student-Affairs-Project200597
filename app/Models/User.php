<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'AcademicNumber',
        'Specialization',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public static function getCurrentStudent()
    {
        return User::where('id', Auth::user()->id)->get();
    }
    public static function getStudents()
    {
        return User::where('role', 'student')->get();
    }
    public static function GetDoctorStudents()
    {
        $students = User::join('student_courses', 'users.id', '=', 'student_courses.students_id')
            ->where('student_courses.name', Auth::user()->specialization)
            ->get();

        return $students;

    }

    public static function getDoctors()
    {
        return User::where('role', 'doctor')->get();
    }
    public static function GetOneDoctor()
    {
        return User::where('role', 'doctor')->where('specialization', Auth::user()->specialization)->get();
    }
    public static function GetStudentDoctors()
    {
        $student_courses = StudentCourses::getSubjects(Auth::user()->id)->pluck('name')
            ->toArray();;
        return User::where('role', 'doctor')->whereIn('specialization', $student_courses)->get();
    }
    public static function GetAdmin()
    {
        return User::where('role', 'admin')->get()->count();
    }



}
