<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeworkRequest extends FormRequest
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
            'lesson_id'  => ['required', 'exists:lessons,id'],
            'todo_id'    => ['required', 'array'],
            'todo_id.*'  => ['required', 'exists:todos,id'],
            'homework'   => ['required', 'array'],
            'homework.*' => ['required', 'string', 'max:255'],
        ];
    }
}
