<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralEmployee extends Model
{
    use HasFactory;

    protected $primaryKey = 'general_employee_no';
    protected $guarded=[];
}
