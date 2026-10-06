<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'service' => ['nullable', 'string', 'max:255'],
            'preferred_date' => ['required', 'date', 'after_or_equal:today'],
            'message' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'preferred_date.required' => 'Please choose a preferred date.',
            'preferred_date.date' => 'Please choose a valid date.',
            'preferred_date.after_or_equal' => 'Please choose a date from today onwards.',
        ];
    }
}
