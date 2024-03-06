<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstyearConsultation extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $primaryKey = 'record_number';

    protected $guarded = [];
    
 
    public function firstyear()
    {
        return $this->belongsTo(Firstyear::class, 'firstyear_id', 'temp_id');
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


    public function releaseResult() {
        return $this->belongsTo(ReleaseResult::class, 'record_number', 'record_number');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'record_number','record_number'); 
    }

    
    public function firstyearSoap()
    {
        return $this->belongsTo(FirstyearSoap::class, 'record_number', 'record_number');
    }
}
