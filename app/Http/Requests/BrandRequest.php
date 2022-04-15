<?php

namespace App\Http\Requests;


use App\Rules\UpdateUniqueValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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

        //,Rule::unique('brand_translations')->ignore($this->id)
        return [
           // 'name' => 'required|unique:brand_translations,name,'.$this->id,
            'name' => ['required',new UpdateUniqueValue('brand_translations',$this->id,'brand_id')],
            'photo' => 'required_without:id|file|mimes:jpg,jpeg,png',
        ];

    }
}
