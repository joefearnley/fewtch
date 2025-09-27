<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:5000',
            'send_in' => 'required_without:send-date|string|in:3 Months,6 Months,1 Year,3 Years,5 Years,10 Years',
            'send_date' => 'required_without:send-in|date|after:today',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'send_in.required_without' => 'Please select a send date or interval',
            'send_date.required_without' => 'Please select a send date or interval',
        ];
    }
}
