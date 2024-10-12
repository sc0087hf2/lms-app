<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
