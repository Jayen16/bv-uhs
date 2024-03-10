<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';
    protected $primaryKey = 'staff_id';

    public $timestamps = false;

    protected $guarded = [];

    public function releaseResult()
    {
        return $this->belongsTo(ReleaseResult::class, 'staff_id', 'requested_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id', 'staff_id');
    }

    public function studentconsultation()
    {
        return $this->belongsTo(StudentConsultation::class, 'forwarded_to', 'staff_id');
    }

    public function employeeconsultation()
    {
        return $this->belongsTo(EmployeeConsultation::class, 'forwarded_to', 'staff_id');
    }

    public function outpatientconsultation()
    {
        return $this->belongsTo(OutpatientConsultation::class, 'forwarded_to', 'staff_id');
    }

    public function firstyearconsultation()
    {
        return $this->belongsTo(FirstyearConsultation::class, 'forwarded_to', 'staff_id');
    }

    // public function requestLab(){

    //     return $this->belongsTo(RequestLab::class, 'staff_id', 'requested_by');
    // }

    // public function xray(){

    //     return $this->belongsTo(RoentgenologicalReport::class, 'staff_id', 'performed_by');
    // }

    // public function urinalysis()
    // {
    //     return $this->belongsTo(UrineAnalysisReport::class, 'staff_id', 'performed_by');
    // }

    // public function hematology()
    // {
    //     return $this->belongsTo(HematologyReport::class, 'staff_id', 'performed_by');
    // }

    // public function serology()
    // {
    //     return $this->belongsTo(SerologyReport::class, 'staff_id', 'performed_by');
    // }

    // public function fecalysis()
    // {
    //     return $this->belongsTo(FecalysisReport::class, 'staff_id', 'performed_by');
    // }


    // public function bloodchemistry()
    // {
    //     return $this->belongsTo(BloodChemistryReport::class, 'staff_id', 'performed_by');
    // }

    // public function ecg()
    // {
    //     return $this->belongsTo(Ecg::class, 'staff_id', 'requested_by');
    // }

    // public function drugTest()
    // {
    //     return $this->belongsTo(DrugTest::class, 'staff_id', 'requested_by');
    // }

    // public function pregnancyTest()
    // {
    //     return $this->belongsTo(PregnancyTest::class, 'staff_id', 'requested_by');
    // }

    // public function neuro()
    // {
    //     return $this->belongsTo(Neuropsychiatric::class, 'staff_id', 'requested_by');
    // }

    // public function otherForm()
    // {
    //     return $this->belongsTo(OtherForm::class, 'staff_id', 'requested_by');
    // }

    // public function vaccination()
    // {
    //     return $this->belongsTo(Vaccination::class, 'staff_id', 'requested_by');
    // }

    public function studentDental(){
        return $this->belongsTo(StudentDental::class, 'staff_id', 'consulted_by');
    }
    public function employeeDental(){
        return $this->belongsTo(StudentDental::class, 'staff_id', 'consulted_by');
    }
    public function outpatientDental(){
        return $this->belongsTo(StudentDental::class, 'staff_id', 'consulted_by');
    }

}


