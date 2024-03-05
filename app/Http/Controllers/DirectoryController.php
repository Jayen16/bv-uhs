<?php

namespace App\Http\Controllers;

use App\Http\Resources\DirectoryResource;
use App\Models\Firstyear;
use App\Models\GeneralEmployee;
use App\Models\GeneralStudent;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function index($individual_type, Request $request){

        $searchTerm = $request->input('search');
    
        if ($individual_type === 'student_applicant') {
            $query = Firstyear::query();

            if ($searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('google_email', 'like', '%' . $searchTerm . '%')
                        ->orWhere('temp_id', 'like', '%' . $searchTerm . '%')
                        ->orWhere('id_number', 'like', '%' . $searchTerm . '%');
                });
            }

        } elseif ($individual_type === 'general_student') {
            $query = GeneralStudent::query();

            if ($searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('google_email', 'like', '%' . $searchTerm . '%')
                        ->orWhere('id_number', 'like', '%' . $searchTerm . '%');
                });
            }

        } elseif ($individual_type === 'general_employee') {
            $query = GeneralEmployee::query();

            if ($searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('google_email', 'like', '%' . $searchTerm . '%')
                        ->orWhere('id_number', 'like', '%' . $searchTerm . '%');
                });
            }
        
        } 
    
    
        $results = $query->paginate(15);
    
        return DirectoryResource::collection($results);
    }
    
    
}
