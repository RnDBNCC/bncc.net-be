<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'event_poster' => 'required',
            'event_title' => 'required',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
            'event_start_time' => 'required',
            'event_end_time' => 'required',
        ];
    }
}
