<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    protected $fillable = ['forename', 'surname', 'ais', 'status', 'start', 'exam_id'];
    
    public $timestamps = false;
    use HasFactory;
}
