<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswerPair extends Model
{
    protected $fillable = ['answer', 'option', 'rightness', 'question_id', 'student_exam_id'];

    public $timestamps = false;
    use HasFactory;
}
