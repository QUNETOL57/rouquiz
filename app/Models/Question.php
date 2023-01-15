<?php

namespace App\Models;

use App\Enums\QuestionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $casts = [
        'type' => QuestionTypeEnum::class
    ];


    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
