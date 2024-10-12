<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getNonAchievementGoal()
    {
        return $this->hasOne(Goal::class)->whereNull('achievement_date');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function getLatestLesson()
    {
        return $this->hasOne(Lesson::class)->orderBy('next_lesson_date', 'desc')->first() ?: null;
    }
}
