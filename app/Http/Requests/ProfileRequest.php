<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
//            'email' => 'required|email|unique:admins,email,'.auth('admin')->user()->id,
            'password' => 'nullable|confirmed|min:6'
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
            'email.unique' => 'البريد الالكتروني مستخدم',
            'password.required' => 'الرجاء إدخال كلمة المرور',
            'password.min' => 'كلمة المرور يجب ان لا تقل عن 6 خانات',
        ];
    }
}
