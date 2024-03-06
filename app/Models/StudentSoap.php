<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSoap extends Model
{
    use HasFactory;

    protected $primaryKey = 'record_number';
    protected $guarded = [];

    public function studentConsultation()
    {
        return $this->belongsTo(StudentConsultation::class, 'record_number', 'record_number');
    }
    
}
