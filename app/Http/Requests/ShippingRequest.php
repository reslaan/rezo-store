<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'id' => 'exists:settings',
            'value' => 'required',
            'plain_value' => 'nullable|numeric'
        ];
    }
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'رقم وسيلة التوصيل مطلوب',
            'id.exists' => 'رقم وسيلة التوصيل غير موجود',
            'value.required' => 'الرجاء إدخال وسيلة التوصيل',
            'plain_value.numeric' => 'قيمة التوصيل يجب ان تكون رقم',
        ];
    }
}
