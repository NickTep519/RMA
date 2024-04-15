<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:8'],
            'description' => ['required', 'string', 'min:8'],
            'surface' => ['required', 'integer'],
            'rooms' => ['required', 'integer'],
            'bedrooms' => ['required', 'integer'],
            'floor' => ['required', 'integer'], 
            'price' => ['required', 'integer'],
            'neighborhood' => ['required', 'string', 'min:2'],
            'sold' => ['required','boolean'],
            'rent_advance' => ['required', 'integer', 'min:0'],
            'rent_prepaid' => ['required', 'integer', 'min:0'],
            'cee' => ['required', 'integer', 'min:0'],
            'commission' => ['required', 'integer', 'min:0'],
            'visit_fees' => ['required', 'integer', 'min:0'],
            'city' => ['required'],
            'images.*' => ['required','mimes:jpeg,png,jpg','image', 'max:2000']
        ] ;
    }
}
