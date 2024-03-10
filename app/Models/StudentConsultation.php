<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentConsultation extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'record_number';

    protected $guarded = [];
    
 
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }


    public function notifications()
    {
        return $this->hasMany(Notification::class, 'record_number', 'record_number');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'forwarded_to', 'staff_id');
    }


    public function userRelease() {
        return $this->belongsTo(ReleaseResult::class, 'forwarded_to', 'requested_by');
    }


    public function marks()
    {
        return $this->hasMany(Mark::class,'record_number','record_number'); 
    }

    public function studentSoap()
    {
        return $this->belongsTo(StudentSoap::class, 'record_number', 'record_number');
    }

    public function soap()
    {
        return $this->belongsTo(StudentSoap::class, 'record_number', 'record_number');
    }

     //same studentSoap and soap (para lang d na mag rename sa vue)
    
}
