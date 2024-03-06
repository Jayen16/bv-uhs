<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeConsultation extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'record_number';

    protected $guarded = [];
    
 
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
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

    
    public function employeeSoap()
    {
        return $this->belongsTo(EmployeeSoap::class, 'record_number', 'record_number');
    }
    
}
