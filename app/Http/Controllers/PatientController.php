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

    public function preview($patient_id){


        if(Student::where('student_id',$patient_id)){
            $patientInfo = Student::with(['StudentConsultation' ,'StudentConsultation.studentSoap','StudentConsultation.staff'])
            ->where('student_id', $patient_id)
            ->first();

            $type = 'Student';
        }elseif(Employee::where('employee_id',$patient_id)){
            $patientInfo = Employee::with(['EmployeeConsultation' ,'EmployeeConsultation.employeeSoap','EmployeeConsultation.staff'])
            ->where('employee_id', $patient_id)
            ->first();

            $type = 'Employee';

        }elseif(Outpatient::where('outpatient_id',$patient_id)){
            $patientInfo = Outpatient::with(['OutpatientConsultation' ,'OutpatientConsultation.outpatientSoap','OutpatientConsultation.staff'])
            ->where('outpatient_id', $patient_id)
            ->first();

            $type = 'Outpatient';

        }elseif(Firstyear::where('temp_id',$patient_id)){
            $patientInfo = Firstyear::with(['FirstyearConsultation' ,'FirstyearConsultation.studentSoap','FirstyearConsultation.staff'])
            ->where('temp_id', )
            ->first();
            
            $type = 'Firstyear';
        }
  

        $result = [
            'patientInfo' => $patientInfo,
            'type' => $type
        ];
        
        return $result;
        
    }
}