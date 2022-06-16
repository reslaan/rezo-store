<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ' :attribute يجب أن يكون مقبول',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'تاريخ :attribute يجب أن يكون بعد :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'تأكيد :attribute غير متطابق ',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'هذا :attribute مكرر',
    'email' => 'الرجاء إدخال بريد الكتروني صحيح',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => ' :attribute يجب أن يكون ملف.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ' :attribute يجب أن تكون أكبر من أو تساوي: :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ' :attribute يجب أن يكون صورة.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ' :attribute يجب أن لا يتعدى  :max أرقام.',
        'file' => ' :attribute يجب أن لا يتعدى :max كيلوبايت.',
        'string' => ' :attribute يجب أن لا يتعدى :max حرف.',
        'array' => ' :attribute يجب أن لا تتعدى :max عناصر.',
    ],
    'mimes' => 'نوع :attribute يجب أن يكون :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ' :attribute يجب أن لا يقل عن :min أرقام.',
        'file' => ' :attribute يجب أن لا يقل عن  :min كيلوبايت.',
        'string' => ' :attribute يجب أن لا يقل عن :min حروف.',
        'array' => ' :attribute يجب ان تحتوي على الأقل على  :min عناصر.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => ' تنسيق :attribute غير صحيح ',
    'numeric' => ' :attribute يجب أن يكون رقم',
    'password' => 'كلمة المرور غير صحيحة',
    'present' => ' :attribute يجب أن يكون موجود',
    'regex' => 'The :attribute format is invalid.',
    'required' => ' الرجاء إدخال  :attribute',
    'required_if' => 'الرجاء إدخال :attribute عندما :other تساوي :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => ' الرجاء إدخال  :attribute ',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ' :attribute يجب أن يكون نص.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ' هذا :attribute مستخدم  .',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
            'today' => 'اليوم',
        ],
        'start_date' => [
            'after' => 'تاريخ بداية العرض يجب أن يكون بعد تاريخ اليوم'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => __('forms.name'),
        'price' => __('forms.price'),
        'photo' => __('forms.photo'),
        'slug' => __('forms.slug'),
        'qty' => __('forms.qty'),
        'sku' => __('forms.sku'),
        'categories' => __('forms.categories'),
        'tags' => __('forms.tags'),
        'brand' => __('forms.brand'),
        'short_description' => __('forms.short_description'),
        'description' => __('forms.description'),
        'value' => __('forms.shipping-value'),
        'attribute_options.*.*.name' => __('forms.option'),
        'attribute_options.*.*.price' => __('forms.price'),
        'code' => __('forms.code'),
        'type' => __('forms.type'),
        'discount' => __('forms.discount'),
        'start_date' => __('forms.start_offer'),
        'end_date' => __('forms.end_offer'),
    ],

];
