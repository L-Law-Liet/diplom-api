<?php

namespace App\Modules\Auth\Requests;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:filter', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'size:11', 'unique:users,phone'],
            'password' => ['required', 'string', 'between:8,255', 'confirmed'],
        ];
    }
}