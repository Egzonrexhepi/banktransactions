<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is missing',
            'email.required' => 'Email is missing',
            'password.required' => 'Email is mssing',
            'name.string' => 'Name must be string',
            'email.string' => 'Email must be string',
            'password.string' => 'Passwprd must be string',
            'name.max' => 'Name length is max 255',
            'password.min' => 'Name length is min 6',
            'email.max' => 'Email length is max 255',
            'email.email' => 'Bad email format',
            'email.unique' => 'Email already exists'
        ];
    }
}
