<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'login' => 'required|min:3',
            'password' => 'required',
        ];
    }


    public function messages()
    {

        return [
            'login.min' => __('validation.min', ['attribute' => __('name')]),
            'login.exists' => __('validation.exists'),
        ];
    }
}
