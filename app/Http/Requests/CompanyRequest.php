<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
            'name' => [
                'required', 'string', 'max:400',
                Rule::unique('companies')->ignore(
                    array_key_exists('company', $this->route()->parameters)
                        ? $this->route()->parameters['company']
                        : null
                )
            ],
            'email' => 'nullable|string',
            'website' => 'nullable|string',
            'logo' => 'nullable|string'
        ];
    }
}
