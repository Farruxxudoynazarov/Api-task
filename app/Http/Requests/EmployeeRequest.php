<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
                'passport' => 'required|unique:employees|regex:/^[A-Z]{2}\d{7}$/',
                'last_name' => 'required',
                'first_name' => 'required',
                'father_name' => 'required',
                'position' => 'required',
                'phone_number' => 'required',
                'address' => 'required|max:255',
                'company_id' => 'required_if:role,company|exists:companies,id'

        ];
    }
}
