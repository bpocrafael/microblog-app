<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex: /^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*()_+{}[\]:;<>,.?~\\-]).{8,}$/',
            ],
        ];
    }

    /**
     * Error message for the forms
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The username field is required.',
            'name.unique' => 'The username has already been taken.',
            'email.required' => 'The email address field is required.',
            'email.email' => 'The email address must be a valid email address.',
            'email.unique' => 'The email address has already been taken.',
            'email' => 'Custom error message for the email field without "@" symbol.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.regex' => 'The password must contain at least one uppercase letter, lowercase letter, special character, and at least 8 characters long.',
        ];
    }
}
