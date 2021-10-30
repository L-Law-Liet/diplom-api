<?php

namespace App\Modules\Auth\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordMobileRequest extends FormRequest
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
            'code' => 'required|exists:users,reset_code',
            'password' => User::NEW_PASSWORD_RULES
        ];
    }
}
