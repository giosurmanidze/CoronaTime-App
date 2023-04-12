<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:3|unique:users,name",
            "email" => "required|unique:users,email",
            'password' => ['required', 'min:3', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => "Name is required!",
            'password.required' => "Password is required!",
        ];
    }
}
