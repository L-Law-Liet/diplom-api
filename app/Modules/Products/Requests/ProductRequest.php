<?php

namespace App\Modules\Products\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'image' => 'required|mimes:jpg,png,gif',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
