<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'teacher_id' => 'required|exists:teachers,id',
            'guardian' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'school' => 'required|string|max:255',
            'school_year' => 'required|string|max:255',
            'desired_school' => 'nullable|string|max:255',
        ];
    }
}
