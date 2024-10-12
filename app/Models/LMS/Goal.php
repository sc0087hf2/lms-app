<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
