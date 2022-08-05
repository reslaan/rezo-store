<?php

namespace App\Http\Requests;

use App\Rules\UpdateUniqueValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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

//    public function prepareForValidation()
//    {
//        $this->merge([
//            'slug' => Str::slug($this->slug),
//        ]);
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => ['required',new UpdateUniqueValue('category_translations',$this->id,'category_id')],
            'slug' => ['required',new UpdateUniqueValue('categories',$this->id,null)],
            'parent_id' => 'required|exists:categories,id',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'


        ];
    }


    public function messages()
    {
        return [

        ];
    }

}
