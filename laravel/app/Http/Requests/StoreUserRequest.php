<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreUserRequest extends FormRequest
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
            'first_name' => ['required' , 'regex:/^[a-zA-Z\s]+$/', 'max:100'],
            'last_name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:100'],
            'middle_initial' => ['nullable', 'alpha', 'max:1'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required'],
            'phone' => ['nullable', 'digits:11'],
            'address' => ['nullable', 'string', 'max:255'],
            'username' => ['required','string','max:50','unique:users,username'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string', 'confirmed' ,'min:8', Rules\Password::defaults()]
        ];
    }
}
