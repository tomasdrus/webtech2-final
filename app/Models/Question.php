<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function exams(){
        return $this->belongsToMany(Exam::class, 'exam_questions');
    }
}
