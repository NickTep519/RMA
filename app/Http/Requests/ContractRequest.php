<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'tenant_name' => ['required', 'string', 'min:3'],
            'tenant_phone' => ['required', 'regex:/^\+(\d{3})\d{8,12}$/'],
            'npi' => ['required', 'integer', 'digits:6'],
            'profession' => ['required', 'string', 'min:3'], 
            'property' => ['required'],
            'integration_date' => ['required', 'date']
        ];
    }
}
