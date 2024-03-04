<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLaboratoryStaff extends FormRequest
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
            'full_name' => 'required|string',
            'role' => 'required|string',
            'professional_title' => 'required|string|string',
            'license_no' => 'required|numeric|unique:laboratory_roles',
            'image_signature' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
