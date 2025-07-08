<?php

namespace CountryList\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
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
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'name'       => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'unique:states,name'],
            'status'     => ['required', 'in:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'country_id.required' => 'Country field is required.',
            'country_id.integer'  => 'Country field must be an integer value.',
            'country_id.exists'   => 'Selected country does not exist.',

            'name.required' => 'State name is required.',
            'name.string'   => 'State name must be a string.',
            'name.regex'    => 'State name must be a combination of letters and spaces only; special characters are not allowed.',
            'name.unique'   => 'State name must be unique.',

            'status.required' => 'Status field is required.',
            'status.in'       => 'Status field must be either 1 (active) or 0 (inactive).',
        ];
    }
}
