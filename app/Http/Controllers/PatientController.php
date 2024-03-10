<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientResource;
use App\Models\Employee;
use App\Models\Firstyear;
use App\Models\Outpatient;
use App\Models\Staff;
use App\Models\Student;
use App\Models\StudentConsultation;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index($patient_type, Request $request){

        $searchTerm = $request->input('search');
    
        if ($patient_type === 'student') {
            $query = Student::query();

            if ($searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('course', 'like', '%' . $searchTerm . '%')
                        ->orWhere('bloodtype', 'like', '%' . $searchTerm . '%')
                        ->orWhere('student_id', 'like', '%' . $searchTerm . '%');
                });
            }

        } elseif ($patient_type === 'employee') {
            $query = Employee::query();

            if ($searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('department', 'like', '%' . $searchTerm . '%')
                        ->orWhere('bloodtype', 'like', '%' . $searchTerm . '%')
                        ->orWhere('employee_id', 'like', '%' . $searchTerm . '%');
                });
            }

        } elseif ($patient_type === 'outpatient') {
            $query = Outpatient::query();

            if ($searchTerm) {
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('bloodtype', 'like', '%' . $searchTerm . '%')
                        ->orWhere('outpatient_id', 'like', '%' . $searchTerm . '%');
                });
            }
        
        } 
    
    
        $results = $query->paginate(15);
    
        return PatientResource::collection($results);
    }

    public function preview($patient_type,$patient_id){


        if(Student::where('student_id',$patient_id)){
            $patientInfo = Student::with(['consultation' ,'consultation.soap','consultation.staff'])
            ->where('student_id', $patient_id)
            ->first();

        }elseif(Employee::where('employee_id',$patient_id)){
            $patientInfo = Employee::with(['consultation' ,'consultation.soap','consultation.staff'])
            ->where('employee_id', $patient_id)
            ->first();


        }elseif(Outpatient::where('outpatient_id',$patient_id)){
            $patientInfo = Outpatient::with(['consultation' ,'consultation.soap','consultation.staff'])
            ->where('outpatient_id', $patient_id)
            ->first();


        }elseif(Firstyear::where('temp_id',$patient_id)){
            $patientInfo = Firstyear::with(['consultation' ,'consultation.soap','consultation.staff'])
            ->where('temp_id', )
            ->first();
            
        }
  

        $result = [
            'patientInfo' => $patientInfo,
            'type' => $patient_type
        ];
        
        return $result;
        
    }


    public function AttendingPhysician(){
        $staffRecords = Staff::where('type_id', '3')->get();

        $staffTypeIds = $staffRecords->pluck('type_id')->toArray();
        
        $this->physicians = Staff::with(['user', 'studentconsultation'])
            ->whereIn('type_id', $staffTypeIds)
            ->whereHas('user', function ($query) use ($staffTypeIds) {
                $query->whereIn('type_id', $staffTypeIds);
            })
            ->get();
    
    }
}