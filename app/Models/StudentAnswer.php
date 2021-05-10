<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $fillable = ['answer', 'question_id', 'student_exam_id'];

    public $timestamps = false;
    use HasFactory;
}
