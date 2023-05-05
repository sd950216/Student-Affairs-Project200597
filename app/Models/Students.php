<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'username',
        'password',
        'AdNumber',
    ];


    public function subjects()
    {
        return $this->hasMany(StudentsSubjects::class);
    }
}
