<?php

return [
    'resource' => [
        'label' => 'بلاغ قمامة',
        'plural_label' => 'بلاغات القمامة',
    ],
    'fields' => [
        'reporter_name' => 'اسم المبلغ',
        'location' => 'الموقع',
        'description' => 'وصف البلاغ',
        'images' => 'الصور',
        'status' => [
            'label' => 'الحالة',
            'options' => [
                'pending' => 'قيد الانتظار',
                'in_progress' => 'جاري المعالجة',
                'completed' => 'تم المعالجة',
            ],
        ],
    ],
    'sections' => [
        'reporter_info' => 'معلومات المبلغ',
        'location_info' => 'موقع القمامة',
        'report_details' => 'تفاصيل البلاغ',
        'status_info' => 'حالة البلاغ',
    ],
];
