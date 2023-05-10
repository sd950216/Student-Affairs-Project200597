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



    public function students(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Students::class)->withPivot('grade')->withTimestamps();
    }

    public function departments(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Departments::class);
    }
    public static function getSubjects()
    {
        return Courses::all();
    }

}


