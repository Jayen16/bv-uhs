<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralStudent extends Model
{
    use HasFactory;

    protected $primaryKey = 'general_student_no';
    
    protected $guarded=[];
}
