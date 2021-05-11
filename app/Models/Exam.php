<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['name', 'token', 'length', 'active'];

    public $timestamps = false;
    use HasFactory;

    public function questions(){
        return $this->belongsToMany(Question::class, 'exam_questions');
    }
}
