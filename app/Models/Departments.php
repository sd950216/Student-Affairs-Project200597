<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model

{

    protected $fillable = [
        'name',
        'code',
    ];

    public function subjects()
    {
        return $this->hasMany(Subjects::class);
    }
}

