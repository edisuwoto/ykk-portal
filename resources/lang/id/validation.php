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

    'accepted' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus disetel setelah :date.',
    'after_or_equal' => ':attribute harus disetel setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh berisi huruf.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
    'array' => ':attribute harus berupa array.',
    'before' => ':attribute harus disetel sebelum :date.',
    'before_or_equal' => ':attribute harus disetel sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus di antara :min dan :max.',
        'file' => ':attribute harus di antara :min dan :max kilobyte.',
        'string' => ':attribute harus di antara :min dan :max karakter.',
        'array' => ':attribute harus ada di antara :min dan :max item.',
    ],
    'boolean' => 'Kolom :attribute harus bernilai true atau false.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ':attribute harus berupa tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak cocok dengan format :format.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus terdiri dari :digits digit.',
    'digits_between' => ':attribute harus terdiri antara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak sah.',
    'distinct' => 'Kolom :attribute memiliki nilai duplikat.',
    'email' => ':attribute harus berupa alamat email yang sah.',
    'ends_with' => ':attribute harus diakhiri dengan salah satu dari berikut ini: :values.',
    'exists' => ':attribute yang dipilih tidak sah.',
    'file' => ':attribute harus berupa file.',
    'filled' => 'Kolom :attribute harus memiliki nilai.',
    'gt' => [
        'numeric' => ':attribute harus lebih dari :value.',
        'file' => ':attribute harus lebih dari :value kilobyte.',
        'string' => ':attribute harus lebih dari :value karakter.',
        'array' => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih dari atau sama dengan :value.',
        'file' => ':attribute harus lebih dari atau sama dengan :value kilobyte.',
        'string' => ':attribute harus lebih dari atau sama dengan :value karakter.',
        'array' => ':attribute harus memiliki :value items atau lebih.',
    ],
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak sah.',
    'in_array' => 'Kolom :attribute tidak ada dalam :other.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'ip' => ':attribute harus berupa alamat IP yang sah.',
    'ipv4' => ':attribute harus berupa IPv4 yang sah.',
    'ipv6' => ':attribute harus berupa IPv6 yang sah.',
    'json' => ':attribute harus berupa JSON string yang sah.',
    'lt' => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file' => ':attribute harus kurang dari :value kilobyte.',
        'string' => ':attribute harus kurang dari :value karakter.',
        'array' => ':attribute harus memiliki kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'file' => ':attribute harus kurang dari atau sama dengan :value kilobyte.',
        'string' => ':attribute harus kurang dari atau sama dengan :value karakter.',
        'array' => ':attribute harus tidak memiliki lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute harus tidak lebih dari :max.',
        'file' => ':attribute harus tidak lebih dari :max kilobyte.',
        'string' => ':attribute harus tidak lebih dari :max karakter.',
        'array' => ':attribute harus tidak boleh memiliki lebih dari :max item.',
    ],
    'mimes' => ':attribute harus berupa file tipe: :values.',
    'mimetypes' => ':attribute harus berupa file tipe: :values.',
    'min' => [
        'numeric' => ':attribute harus minimal :min.',
        'file' => ':attribute harus minimal :min kilobyte.',
        'string' => ':attribute harus minimal :min karakter.',
        'array' => ':attribute harus memiliki minimal :min item.',
    ],
    'multiple_of' => ':attribute harus berupa kelipatan dari :value.',
    'not_in' => ':attribute yang dipilih tidak sah.',
    'not_regex' => 'Format :attribute tidak sah.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => 'Kata sandi tidak benar.',
    'present' => 'Kolom :attribute harus ada.',
    'regex' => 'Format :attribute tidak sah.',
    'required' => 'Kolom :attribute diperlukan.',
    'required_if' => 'Kolom :attribute diperlukan ketika :other adalah :value.',
    'required_unless' => 'Kolom :attribute diperlukan kecuali :other ada di :values.',
    'required_with' => 'Kolom :attribute diperlukan ketika :values ada.',
    'required_with_all' => 'Kolom :attribute diperlukan ketika :values ada.',
    'required_without' => 'Kolom :attribute diperlukan ketika :values tidak ada.',
    'required_without_all' => 'Kolom :attribute diperlukan ketika tidak ada :values ada.',
    'prohibited_if' => 'Kolom :attribute dilarang ketika :other adalah :value.',
    'prohibited_unless' => 'Kolom :attribute dilarang kecuali :other ada di :values.',
    'same' => ':attribute dan :other harus cocok.',
    'size' => [
        'numeric' => ':attribute harus berupa :size.',
        'file' => ':attribute harus berupa :size kilobyte.',
        'string' => ':attribute harus berupa :size karakter.',
        'array' => ':attribute harus berisi :size item.',
    ],
    'starts_with' => ':attribute harus dimulai dengan salah satu dari berikut ini: :values.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus berupa zona waktu yang sah.',
    'unique' => ':attribute telah terpakai.',
    'uploaded' => ':attribute gagal diunggah.',
    'url' => 'Format :attribute tidak sah.',
    'uuid' => ':attribute harus berupa UUID yang sah.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
