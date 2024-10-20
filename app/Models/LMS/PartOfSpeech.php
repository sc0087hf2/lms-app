<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartOfSpeech extends Model
{
    use HasFactory;

    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
