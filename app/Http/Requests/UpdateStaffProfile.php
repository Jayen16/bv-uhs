<?php

namespace App\Http\Requests;

use App\Models\Staff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStaffProfile extends FormRequest
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
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'license_no' => 'nullable|numeric', Rule::unique(Staff::class)->ignore($this->user()->staff_id),
            'specialization' => 'nullable|string',
            'address' => 'nullable|string',
            'image_user' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'image_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
