<?php

namespace App\Modules\Orders\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CartsRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'count' => 'required|integer|min:1',
        ];
    }
}
