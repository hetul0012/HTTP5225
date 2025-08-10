<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:150'],
            'description' => ['nullable','string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a course name.',
            'name.max' => 'Course name cannot exceed 150 characters.',
        ];
    }
}
