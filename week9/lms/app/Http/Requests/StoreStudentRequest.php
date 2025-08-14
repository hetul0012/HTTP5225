<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname'      => ['required','string','max:150'],
            'lname'      => ['required','string','max:150'],
            'email'      => ['required','email','max:255','unique:students,email'],
            // many-to-many courses (checkboxes)
            'courses'    => ['nullable','array'],
            'courses.*'  => ['integer','exists:courses,id'],
        ];
    }
}
