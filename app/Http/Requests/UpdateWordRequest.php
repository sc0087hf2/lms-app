<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWordRequest extends FormRequest
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
            'part_of_speech_id' => ['required', 'exists:part_of_speeches,id'],
            'en_word'           => ['required', 'string', 'max:255'],
            'ja_word'           => ['required', 'string', 'max:255'],
            'en_example'        => ['nullable', 'string', 'max:1000'],
            'ja_example'        => ['nullable', 'string', 'max:1000'],

        ];
    }
}
