<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        $studentId = $this->route('student')?->id;

        return [
            'fname'      => ['required','string','max:150'],
            'lname'      => ['required','string','max:150'],
            'email'      => ['required','email','max:255','unique:students,email,' . $studentId],
        
            'courses'    => ['nullable','array'],
            'courses.*'  => ['integer','exists:courses,id'],
        ];
    }
}
