<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUser extends FormRequest
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
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users',
            'license_no' => 'required|numeric|unique:staffs',
            'email' => 'required|email|unique:staffs|ends_with:.com',
            'password' => 'required|string|min:6|confirmed',
            'type_id' => 'required|numeric',
            'image_user' => 'reqyured|image|mimes:jpeg,png,jpg,gif',
            'image_signature' => 'reqyured|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
