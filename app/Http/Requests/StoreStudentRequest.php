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
            'student_id' => 'required|string|max:20|unique:students,student_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender' => 'required|in:male,female',
            'study_program_id' => 'required|exists:study_programs,id',
            'entry_year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'status' => 'required|in:active,inactive,graduated,dropped',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'student_id.required' => 'Student ID is required.',
            'student_id.unique' => 'This student ID is already taken.',
            'name.required' => 'Student name is required.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'This email is already registered.',
            'gender.required' => 'Gender is required.',
            'study_program_id.required' => 'Study program is required.',
            'study_program_id.exists' => 'Selected study program is invalid.',
            'entry_year.required' => 'Entry year is required.',
            'status.required' => 'Status is required.',
        ];
    }
}