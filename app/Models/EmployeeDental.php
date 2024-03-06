<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDental extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'dental_record';

    public function teethMark()
    {
        return $this->hasMany(TeethMark::class,'dental_record','dental_record'); 
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'dentalpatient_id', 'employee_id');
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'consulted_by', 'staff_id');
    }
    
}
