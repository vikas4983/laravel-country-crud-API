<?php

namespace CountryList\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
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
            'state_id' => ['required', 'integer', 'exists:states,id'],
            'name'     => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'unique:states,name'],
            'status'   => ['required', 'in:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'state_id.required' => 'State field is required.',
            'state_id.integer'  => 'State must be an integer.',
            'state_id.exists'   => 'Selected state does not exist.',

            'name.required'     => 'City name is required.',
            'name.string'       => 'City name must be a string.',
            'name.regex'        => 'City name must contain only letters and spaces.',
            'name.unique'       => 'This city already exists in the selected state.',

            'status.required'   => 'Status field is required.',
            'status.in'         => 'Status must be 1 (active) or 0 (inactive).',
        ];
    }
}
