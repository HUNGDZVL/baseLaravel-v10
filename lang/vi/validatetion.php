<?php

return [
    'accepted' => ':attribute phải được chấp nhận.',
    'active_url' => ':attribute không phải là URL hợp lệ.',
    'after' => ':attribute phải là một ngày sau :date.',
    'after_or_equal' => ':attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => ':attribute chỉ được chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ được chứa các chữ cái, số và dấu gạch ngang.',
    'alpha_num' => ':attribute chỉ được chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là một ngày trước :date.',
    'before_or_equal' => ':attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'numeric' => ':attribute phải nằm giữa :min và :max.',
        'file' => ':attribute phải nằm giữa :min và :max kilobytes.',
        'string' => ':attribute phải nằm giữa :min và :max ký tự.',
        'array' => ':attribute phải có từ :min đến :max phần tử.',
    ],
    'boolean' => ':attribute phải là true hoặc false.',
    'confirmed' => ':attribute xác nhận không khớp.',
    'date' => ':attribute không phải là ngày hợp lệ.',
    'date_format' => ':attribute không đúng định dạng :format.',
    'different' => ':attribute và :other phải khác nhau.',
    'digits' => ':attribute phải là :digits chữ số.',
    'digits_between' => ':attribute phải nằm giữa :min và :max chữ số.',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => ':attribute có giá trị trùng lặp.',
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'exists' => ':attribute không hợp lệ.',
    'file' => ':attribute phải là một tệp tin.',
    'filled' => ':attribute phải có giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value kilobytes.',
        'string' => ':attribute phải lớn hơn :value ký tự.',
        'array' => ':attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array' => ':attribute phải có :value phần tử hoặc nhiều hơn.',
    ],
    'image' => ':attribute phải là một hình ảnh.',
    'in' => ':attribute không hợp lệ.',
    'in_array' => ':attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là một số nguyên.',
    'ip' => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ':attribute phải nhỏ hơn :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn :value ký tự.',
        'array' => ':attribute phải có ít hơn :value phần tử.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array' => ':attribute không được có nhiều hơn :value phần tử.',
    ],
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'string' => ':attribute không được lớn hơn :max ký tự.',
        'array' => ':attribute không được có nhiều hơn :max phần tử.',
    ],
    'mimes' => ':attribute phải là một tệp tin loại: :values.',
    'mimetypes' => ':attribute phải là một tệp tin loại: :values.',
    'min' => [
        'numeric' => ':attribute phải ít nhất là :min.',
        'file' => ':attribute phải ít nhất là :min kilobytes.',
        'string' => ':attribute phải ít nhất là :min ký tự.',
        'array' => ':attribute phải có ít nhất :min phần tử.',
    ],
    'not_in' => ':attribute không hợp lệ.',
    'not_regex' => 'Định dạng :attribute không hợp lệ.',
    'numeric' => ':attribute phải là một số.',
    'present' => ':attribute phải được trình bày.',
    'regex' => 'Định dạng :attribute không hợp lệ.',
    'required' => ':attribute là bắt buộc.',
    'required_if' => ':attribute là bắt buộc khi :other là :value.',
    'required_unless' => ':attribute là bắt buộc trừ khi :other nằm trong :values.',
    'required_with' => ':attribute là bắt buộc khi :values tồn tại.',
    'required_with_all' => ':attribute là bắt buộc khi tất cả :values tồn tại.',
    'required_without' => ':attribute là bắt buộc khi :values không tồn tại.',
    'required_without_all' => ':attribute là bắt buộc khi không có :values tồn tại.',
    'same' => ':attribute và :other phải khớp.',
    'size' => [
        'numeric' => ':attribute phải là :size.',
        'file' => ':attribute phải là :size kilobytes.',
        'string' => ':attribute phải là :size ký tự.',
        'array' => ':attribute phải chứa :size phần tử.',
    ],
    'string' => ':attribute phải là một chuỗi.',
    'timezone' => ':attribute phải là một múi giờ hợp lệ.',
    'unique' => ':attribute đã tồn tại.',
    'uploaded' => ':attribute tải lên thất bại.',
    'url' => 'Định dạng :attribute không hợp lệ.',
    'uuid' => ':attribute phải là một UUID hợp lệ.',

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
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'tên',
        'email' => 'địa chỉ email',
        'password' => 'mật khẩu',
        'password_confirmation' => 'xác nhận mật khẩu',
    ],

];
