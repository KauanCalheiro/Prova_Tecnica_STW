<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngredientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'unique:ingredients'
            ],

            'description' => [
                'required',
                'max:150',
                'unique:ingredients'
            ],

            'predicted_in_kg' => [
                'nullable'
            ]
        ];
    }
}
