<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    public function partOfSpeech()
    {
        return $this->belongsTo(PartOfSpeech::class);
    }
}
