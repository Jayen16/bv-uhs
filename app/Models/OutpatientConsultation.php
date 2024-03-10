<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutpatientConsultation extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'record_number';

    protected $guarded = [];
    
 
    public function outpatient()
    {
        return $this->belongsTo(Outpatient::class, 'outpatient_id', 'outpatient_id');
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


    public function staffRelease()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'requested_by');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'record_number','record_number'); 
    }

    
    public function outpatientSoap()
    {
        return $this->belongsTo(OutpatientSoap::class, 'record_number', 'record_number');
    }
    public function soap()
    {
        return $this->belongsTo(OutpatientSoap::class, 'record_number', 'record_number');
    }
    
}
