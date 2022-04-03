<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class CategoryRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    /*
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
    */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:category_translations,name,'.$this->id,
            'slug' => 'required|unique:categories,slug,'.$this->id,
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'الرجاء إدخال إسم القسم',
            'slug.required' => 'الرجاء إدخال إسم الرابط',
            'name.unique' => 'اسم القسم موجود بالفعل',
            'slug.unique' => 'اسم الرابط موجود بالفعل',
        ];
    }

}
