<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDental extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'dental_record';

    public function teethMark()
    {
        return $this->hasMany(TeethMark::class,'dental_record','dental_record'); 
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'dentalpatient_id', 'student_id');
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'consulted_by', 'staff_id');
    }
    
    
}
