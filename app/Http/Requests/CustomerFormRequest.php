<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
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
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'id_type_id' => 'required',
            'id_number' => 'required',
            'dob' => 'required',
            'gender_id' => 'required',
            'maritial_status_id' => 'required',
            'region_id' => 'required',
            'district_id' => 'required',
            'location' => 'required',
        ];
    }
}
