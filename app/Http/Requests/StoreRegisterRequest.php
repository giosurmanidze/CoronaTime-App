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
            "email" => "required|email|unique:users,email",
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('validation.required'),
            'email.unique' => __('validation.unique', ['attribute' => __('email')]),
            'name.required' => __('validation.required'),
            'name.min' => __('validation.min', ['attribute' => __('name')]),
            'name.unique' => __('validation.unique', ['attribute' => __('name')]),
            'password.min' => __('validation.min', ['attribute' => __('password')]),
            'password_confirmation.required' => __('validation.required'),
            'password_confirmation.same' => __('validation.same', ['attribute' => __('same')]),
        ];
    }
}
