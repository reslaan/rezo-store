<?php

namespace App\Http\Requests;

use App\Rules\UpdateUniqueValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class TagRequest extends FormRequest
{
    /**
     * @var mixed
     */

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
            //'name' => 'required|unique:tag_translations,name,'.$this->id,
            'name' => ['required',new UpdateUniqueValue('tag_translations',$this->id,'tag_id')],
            'slug' => ['required',new UpdateUniqueValue('tags',$this->id,null)],
//            'slug' => 'required|unique:tags,slug,'.$this->id,
        ];
    }


    public function messages()
    {
        return [

        ];
    }

}
