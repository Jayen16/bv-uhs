<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firstyear extends Model
{
    use HasFactory;
    use Authenticatable;
    protected $primaryKey = 'firstyear_no';
    protected $guarded = [];


    public function firstyeardental()
    {
        return $this->hasMany(FirstyearDental::class, 'firstyear_id', 'temp_id');
    }

    public function firstyearConsultation()
    {
        return $this->belongsTo(FirstyearConsultation::class,'firstyear_id' , 'temp_id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class,'firstyear_id','patient_id'); 
    }

}
