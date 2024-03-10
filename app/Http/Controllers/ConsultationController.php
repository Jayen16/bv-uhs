<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationFormRequest;
use App\Models\EmployeeConsultation;
use App\Models\FirstyearConsultation;
use App\Models\Mark;
use App\Models\OutpatientConsultation;
use App\Models\StudentConsultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function store(ConsultationFormRequest $request)
    {
        $requestData = $request->all();
    
        $type = $requestData['patient_type'];

        if($type==='student'){
            $newConsultation = new StudentConsultation();
            $newConsultation->student_id = $requestData['patient_id_number'];

        }elseif($type==='employee'){
            $newConsultation = new EmployeeConsultation();
            $newConsultation->employee_id = $requestData['patient_id_number'];

        }elseif($type==='outpatient'){
            $newConsultation = new OutpatientConsultation();
            $newConsultation->outpatient_id = $requestData['patient_id_number'];

        }elseif($type==='firstyear'){
            $newConsultation = new FirstyearConsultation();
            $newConsultation->firstyear_id = $requestData['patient_id_number'];
        }
            $newConsultation->patient_type = $type;
            $newConsultation->form_type = 'Consultation';
            $newConsultation->consulted_by = $requestData['consulted_by'];
            $newConsultation->forwarded_to = $requestData['selectedPhysician'];
            $newConsultation->purpose = $requestData['selectedPurpose'];
            $newConsultation->complaint = $requestData['selectedCategory'];
            $newConsultation->subcategory = $requestData['selectedSubcategory'];
            $newConsultation->otherCategories = $requestData['otherSubCategory'];
            $newConsultation->mode_of_arrival = $requestData['mode_of_arrival'];
            $newConsultation->valuables = $requestData['selectedValuable'];
            $newConsultation->bloodpressure = $requestData['bloodpressure'];
            $newConsultation->temperature = $requestData['temperature'];
            $newConsultation->pulse_rate = $requestData['pulse_rate'];
            $newConsultation->respiratory_rate = $requestData['respiratory_rate'];
            $newConsultation->height = $requestData['height'];
            $newConsultation->weight = $requestData['weight'];
            $newConsultation->oxygen_sat = $requestData['oxygen_sat'];
            $newConsultation->BMI = $requestData['bmi'];
            $newConsultation->LMP = $requestData['lmp'];
            $newConsultation->patient_with_pain = $requestData['selectedPain'];
            $newConsultation->otherInjuries = $requestData['selectedInjuriesInput'];
            $newConsultation->otherAllergies = $requestData['otherAllergies'];
            $newConsultation->otherFamilyHistory = $requestData['selectedFamilyHistoryOtherInput'];
            $newConsultation->otherMedicalHistory = $requestData['selectedMedicalHistoryOtherInput'];
            $newConsultation->verbal_glasgow = $requestData['selectedVerbalScore'];
            $newConsultation->eye_glasgow = $requestData['selectedEyeScore'];
            $newConsultation->motor_glasgow = $requestData['selectedMotorScore'];
            $newConsultation->NOI = $requestData['noi'];
            $newConsultation->DOI = $requestData['doi'];
            $newConsultation->POI = $requestData['poi'];
            $newConsultation->TOI = $requestData['toi'];

            $selectedInjuries = implode(', ', $requestData['selectedInjuries']);
            $selectedAllergies = implode(', ', $requestData['selectedAllergies']);
            $selectedFamilyHistory = implode(', ', $requestData['selectedFamilyHistory']);
            $selectedMedicalHistory = implode(', ', $requestData['selectedMedicalHistory']);


            $newConsultation->allergies = $selectedAllergies;
            $newConsultation->patient_with_injury = $selectedInjuries;
            $newConsultation->family_history = $selectedFamilyHistory;
            $newConsultation->medical_history = $selectedMedicalHistory;

            $newConsultation->save();

            if (!empty($requestData['headmark'])) {
                foreach ($requestData['headmark'] as $head) {
                    $x = $head['x'];
                    $y = $head['y'];
                    $size = $head['size'];
                
                    $markHead = new Mark();
                    $markHead->x = $x;
                    $markHead->y = $y;
                    $markHead->size = $size;
                    $markHead->part = 'head'; 
                    $markHead->record_number = $newConsultation->record_number; 

                    if($type==='student'){
                        $markHead->patient_id = $newConsultation->student_id; 
            
                    }elseif($type==='employee'){
                        $markHead->patient_id = $newConsultation->employee_id; 
            
                    }elseif($type==='outpatient'){
                        $markHead->patient_id = $newConsultation->outpatient_id; 
            
                    }elseif($type==='firstyear'){
                        $markHead->patient_id = $newConsultation->firstyear_id; 
                    }
                        
                    $markHead->save();
                }
            }
            

            if (!empty($requestData['bodymark'])) {
                foreach ($requestData['bodymark'] as $body) {
                    
                    $x = $body['x'];
                    $y = $body['y'];
                    $size = $body['size'];
                
                    $markBody = new Mark();
                    $markBody->x = $x;
                    $markBody->y = $y;
                    $markBody->size = $size;
                    $markBody->part = 'body'; 
                    $markBody->record_number = $newConsultation->record_number; 
                
                    if($type==='student'){
                        $markBody->patient_id = $newConsultation->student_id; 
            
                    }elseif($type==='employee'){
                        $markBody->patient_id = $newConsultation->employee_id; 
            
                    }elseif($type==='outpatient'){
                        $markBody->patient_id = $newConsultation->outpatient_id; 
            
                    }elseif($type==='firstyear'){
                        $markBody->patient_id = $newConsultation->firstyear_id; 
                    }
                        
                    $markBody->save();
                }
            }
       

    
        return response()->json($requestData);
    }
}
