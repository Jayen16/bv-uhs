<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseResult extends Model
{
    use HasFactory;

    protected $primaryKey = 'record_number';
    protected $guarded = [];
    
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'requested_by', 'staff_id');
    }

    public function firstyearConsultation(){
        return $this->belongsTo(FirstyearConsultation::class, 'record_number', 'record_number');
    }

    public function userRelease(){
        return $this->belongsTo(FirstyearConsultation::class, 'requested_by', 'forwarded_to');
    }
    
    
}
