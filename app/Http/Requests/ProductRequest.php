<?php

namespace App\Http\Requests;

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
            'name' => 'required|string|unique:product_translations,name,'.$this->id,
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'slug' => 'nullable|string|unique:products,slug,'.$this->id,
            'sku' => 'required|string|unique:products,sku,'.$this->id,
            'categories' => 'required',
            'tags' => 'nullable',
            'brand' => 'nullable',
            'short_description' => 'required|string|max:50',
            'description' => 'required|string|max:50',
        ];
    }
}
