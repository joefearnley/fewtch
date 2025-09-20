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
            'send-in' => 'required_without:send-date|string|in:3 Months,6 Months,1 Year,3 Years,5 Years,10 Years',
            'send-date' => 'required_without:send-in|date|after:today',
        ];
    }
}
