<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6'
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
            'email.required' => 'الرجاء إدخال البريد الالكتروني',
            'email.email' => 'الرجاء إدخال بريد الالكتروني صحيح',
            'password.required' => 'الرجاء إدخال كلمة المرور',
            'password.min' => 'كلمة المرور يجب ان لا تقل عن 6 خانات',
        ];
    }
}
