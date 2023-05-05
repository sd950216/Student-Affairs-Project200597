<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{

    protected $fillable = [
        'name',
        'code',
        'department',
        'departments_id',
        'prerequisites',
    ];



    public function students()
    {
        return $this->belongsToMany(Students::class)->withPivot('grade')->withTimestamps();
    }

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
}


