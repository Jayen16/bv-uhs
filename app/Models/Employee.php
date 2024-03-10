<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_no';


    protected $guarded = [];

    public function employeeconsultation()
    {
        return $this->belongsTo(EmployeeConsultation::class, 'employee_id', 'employee_id');
    }

    public function consultation()
    {
        return $this->belongsTo(EmployeeConsultation::class, 'employee_id', 'employee_id');
    }

    public function employeedental()
    {
        return $this->belongsTo(EmployeeDental::class, 'dentalpatient_id', 'employee_id');
    }


    public function marks()
    {
        return $this->hasMany(Mark::class,'employee_id','employee_id'); 
    }
}
