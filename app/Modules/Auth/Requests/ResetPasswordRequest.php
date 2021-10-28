<?php

namespace App\Modules\Auth\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
        $rules = [
            'token' => 'required',
            'email' => 'required|email:filter|exists:users,email'
        ];
        if ($this->isMethod('post')) {
            $rules['password'] = User::NEW_PASSWORD_RULES;
        }
        return $rules;
    }
}
