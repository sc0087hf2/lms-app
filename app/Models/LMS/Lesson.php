<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function homework()
    {
        return $this->hasMany(Homework::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
