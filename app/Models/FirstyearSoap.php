<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstyearSoap extends Model
{
    use HasFactory;

    protected $primaryKey = 'record_number';
    protected $guarded = [];

    public function firstYearConsultation()
    {
        return $this->belongsTo(FirstyearConsultation::class, 'record_number', 'record_number');
    }
}
