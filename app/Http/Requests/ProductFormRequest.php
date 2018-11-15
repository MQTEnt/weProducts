<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255|min:3',
            'vipon_link' => 'required|unique:products|URL|max:255|min:10',
            'amazon_link' => 'required|unique:products|URL|max:255|min:10',
            'sold_price' => 'required|numeric|min:0',
            'item_cost' => 'required|numeric|min:0',
            'code' => 'required',
            'expiry_date' => 'required|numeric|min:1'
        ];
    }
}
