<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_no';

    protected $guarded = [];


    public function studentconsultation()
    {
        return $this->belongsTo(StudentConsultation::class, 'student_id', 'student_id');
    }

    public function studentdental()
    {
        return $this->hasMany(StudentDental::class, 'dentalpatient_id', 'student_id');
    }


    public function marks()
    {
        return $this->hasMany(Mark::class,'student_id','student_id'); 
    }

}
