<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeethMark extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function studentDental()
    {
        return $this->belongsTo(StudentDental::class, 'dental_record', 'dental_record');
    }

    public function employeeDental()
    {
        return $this->belongsTo(EmployeeDental::class, 'dental_record', 'dental_record');
    }

    public function outpatientDental()
    {
        return $this->belongsTo(OutpatientDental::class, 'dental_record', 'dental_record');
    }

    public function firstyearDental()
    {
        return $this->belongsTo(FirstyearDental::class, 'dental_record', 'dental_record');
    }

    
}
