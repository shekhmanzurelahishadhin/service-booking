<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class RegisterRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => ['required', Password::min(6)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'name.string' => 'Name must be text only',
            'name.max' => 'Name cannot exceed 255 characters',

            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.max' => 'Email address cannot exceed 255 characters',
            'email.unique' => 'This email is already registered',

            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ];
    }
}
