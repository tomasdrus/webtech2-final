<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(Question::class, 'id', 'question_id');
    }
}
