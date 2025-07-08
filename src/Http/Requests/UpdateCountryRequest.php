<?php

namespace CountryList\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
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
        $countryId = $this->route('country'); // adjust if your route param is {id}

        return [
            'name'             => ['required', 'string', 'max:255'],
            'code'             => ['nullable', 'string', 'size:2', Rule::unique('countries', 'code')->ignore($countryId)],
            'iso2'             => ['nullable', 'string', 'size:2', Rule::unique('countries', 'iso2')->ignore($countryId)],
            'phone_code'       => ['nullable', 'string', 'max:10'],
            'currency'         => ['nullable', 'string', 'max:10'],
            'currency_symbol'  => ['nullable', 'string', 'max:10'],
            'region'           => ['nullable', 'string', 'max:100'],
            'status'           => ['nullable', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return (new StoreCountryRequest)->messages();
    }
}
