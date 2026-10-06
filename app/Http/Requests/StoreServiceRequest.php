<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'summary' => ['nullable', 'string', 'max:500'],
            'what_is' => ['nullable', 'string', 'max:5000'],
            'who_for' => ['nullable', 'string', 'max:5000'],
            'what_happens' => ['nullable', 'string', 'max:5000'],
            'duration' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
        ];
    }
}
