<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outpatient extends Model
{
    use HasFactory;
    use Authenticatable;

    protected $primaryKey = 'outpatient_no';

    protected $guarded = [];

    public function outpatientconsultation()
    {
        return $this->belongsTo(OutpatientConsultation::class, 'outpatient_id', 'outpatient_id');
    }

    public function consultation()
    {
        return $this->belongsTo(OutpatientConsultation::class, 'outpatient_id', 'outpatient_id');
    }

    public function outpatientdental()
    {
        return $this->belongsTo(OutpatientDental::class, 'outpatient_id', 'outpatient_id');
    }


    public function marks()
    {
        return $this->hasMany(Mark::class,'outpatient_id','outpatient_id'); 
    }
}
