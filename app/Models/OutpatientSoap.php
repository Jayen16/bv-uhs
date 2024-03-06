<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutpatientSoap extends Model
{
    use HasFactory;

    protected $primaryKey = 'record_number';
    protected $guarded = [];

    public function outpatientConsultation()
    {
        return $this->belongsTo(OutpatientConsultation::class, 'record_number', 'record_number');
    }
    
}
