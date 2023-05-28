<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StructureRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'profile_photo' => 'required',
            'profile_name' => 'required',
            'profile_division' => 'required',
            'profile_sub_division' => 'required',
            'profile_position' => 'required',
            'profile_region' => 'required',
            'profile_linkedin' => 'required',
        ];
    }
}
