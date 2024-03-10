<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'selectedPurpose' => ['required', 'string'], 
            'selectedCategory' => ['required', 'string'],
            'selectedSubcategory' => ['required', 'string'], 
            'otherSubCategory' => ['nullable', 'string'], 
            'mode_of_arrival' => ['nullable', 'string'], 
            'valuable_choice' => ['nullable', 'string'], 
            'selectedInjuries' => ['nullable', 'array'], 
            'selectedAllergies' => ['nullable', 'array'],  
            'selectedFamilyHistory' => ['nullable', 'array'],
            'selectedFamilyHistoryOtherInput' => ['nullable', 'string'],
            'selectedMedicalHistory' => ['nullable', 'array'],
            'selectedMedicalHistoryOtherInput' => ['nullable', 'string'], 
            'bloodpressure' => ['nullable', 'string'], 
            'temperature' => ['nullable', 'string'], 
            'pulse_rate' => ['nullable', 'string'], 
            'respiratory_rate' => ['nullable', 'string'], 
            'oxygen_sat' => ['nullable', 'string'], 
            'lmp' => ['nullable', 'date'], 
            'otherAllergies' => ['nullable', 'string'], 
            'noi' => ['nullable', 'string'],
            'doi' => ['nullable', 'string'],
            'toi' => ['nullable', 'string'],
            'poi' => ['nullable', 'string'],
            'selectedEyeScore' => ['nullable', 'string'],
            'selectedVerbalScore' => ['nullable', 'string'],
            'selectedMotorScore' => ['nullable', 'string'],
            'selectedPain' => ['nullable', 'string'], 
            'headmark' => ['nullable'], 
            'bodymark' => ['nullable'], 
            'selectedPhysician' => ['required', 'string'],
            'consulted_by' => ['required', 'string'], 
            'patient_id_number' => ['required', 'string'], 
            'patient_type' => ['required', 'string'], 
        ];
    }
}
