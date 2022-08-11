<?php

namespace App\Http\Requests;

use App\Rules\UpdateUniqueValue;
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
            'name' => ['required','string',new UpdateUniqueValue('product_translations',$this->id,'product_id')],
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'slug' => ['required','string',new UpdateUniqueValue('products',$this->id,null)],
            'sku' => ['required','string',new UpdateUniqueValue('products',$this->id,null)],
            'categories' => 'required',
            'tags' => 'nullable',
            'brand' => 'nullable',
            'short_description' => 'required|string|max:50',
            'description' => 'required|string|max:500',
        ];
    }
}
