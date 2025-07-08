<?php

namespace CountryList\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
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
            'name'             => ['required', 'string', 'max:255'],
            'code'             => ['nullable', 'string', 'size:2', 'unique:countries,code'],
            'iso2'             => ['nullable', 'string', 'size:2', 'unique:countries,iso2'],
            'phone_code'       => ['nullable', 'string', 'max:10'],
            'currency'         => ['nullable', 'string', 'max:10'],
            'currency_symbol'  => ['nullable', 'string', 'max:10'],
            'region'           => ['nullable', 'string', 'max:100'],
            'status'           => ['nullable', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'            => 'Country name is required.',
            'name.string'              => 'Country name must be a string.',
            'name.max'                 => 'Country name cannot be more than 255 characters.',

            'code.string'              => 'Code must be a string.',
            'code.size'                => 'Code must be exactly 2 characters.',
            'code.unique'              => 'This country code is already used.',

            'iso2.string'              => 'ISO2 must be a string.',
            'iso2.size'                => 'ISO2 must be exactly 2 characters.',
            'iso2.unique'              => 'This ISO2 code is already used.',

            'phone_code.string'        => 'Phone code must be a string.',
            'phone_code.max'           => 'Phone code must not exceed 10 characters.',

            'currency.string'          => 'Currency must be a string.',
            'currency.max'             => 'Currency must not exceed 10 characters.',

            'currency_symbol.string'   => 'Currency symbol must be a string.',
            'currency_symbol.max'      => 'Currency symbol must not exceed 10 characters.',

            'region.string'            => 'Region must be a string.',
            'region.max'               => 'Region must not exceed 100 characters.',

            'status.in'                => 'Status must be either 1 (active) or 0 (inactive).',
        ];
    }
}
