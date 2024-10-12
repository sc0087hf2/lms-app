<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'student_id'        => ['required', 'exists:students,id'],
            'lesson_date'       => ['required', 'date'],
            'next_lesson_date'  => ['required', 'date'],
            'lesson'            => ['required', 'string', 'max:1000'],
            'next_lesson'       => ['required', 'string', 'max:1000'],
            'teacher_comment'   => ['nullable', 'string', 'max:1000'],
        ];
    }
}
