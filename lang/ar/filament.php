<?php

return [
    'layout' => [
        'direction' => 'rtl',
    ],

    'pages' => [
        'dashboard' => [
            'title' => 'لوحة التحكم',
        ],
    ],

    'resources' => [
        'label' => 'الموارد',
        'plural_label' => 'الموارد',
    ],

    'forms' => [
        'actions' => [
            'create' => [
                'label' => 'إنشاء',
            ],
            'edit' => [
                'label' => 'تعديل',
            ],
            'view' => [
                'label' => 'عرض',
            ],
            'delete' => [
                'label' => 'حذف',
            ],
            'save' => [
                'label' => 'حفظ',
            ],
            'cancel' => [
                'label' => 'إلغاء',
            ],
        ],

        'modal' => [
            'title' => [
                'create' => 'إنشاء :label',
                'edit' => 'تعديل :label',
                'view' => 'عرض :label',
            ],
        ],

        'validation' => [
            'required' => [
                'message' => 'هذا الحقل مطلوب',
            ],
            'string' => [
                'message' => 'يجب أن يكون هذا الحقل نصاً',
            ],
            'numeric' => [
                'message' => 'يجب أن يكون هذا الحقل رقماً',
            ],
            'email' => [
                'message' => 'يجب أن يكون هذا الحقل بريداً إلكترونياً صحيحاً',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'actions' => [
                'label' => 'الإجراءات',
            ],
        ],
        'filters' => [
            'label' => 'الفلاتر',
        ],
        'actions' => [
            'label' => 'الإجراءات',
            'edit' => [
                'label' => 'تعديل',
            ],
            'view' => [
                'label' => 'عرض',
            ],
            'delete' => [
                'label' => 'حذف',
            ],
        ],
        'empty' => [
            'heading' => 'لا توجد نتائج',
            'description' => 'لم يتم العثور على أي نتائج',
        ],
        'pagination' => [
            'label' => 'التنقل بين الصفحات',
            'overview' => 'عرض :first إلى :last من :total نتيجة',
        ],
    ],

    'notifications' => [
        'saved' => [
            'title' => 'تم الحفظ',
            'message' => 'تم حفظ البيانات بنجاح',
        ],
        'deleted' => [
            'title' => 'تم الحذف',
            'message' => 'تم حذف البيانات بنجاح',
        ],
    ],

    'confirmation' => [
        'title' => 'هل أنت متأكد؟',
        'cancel' => 'إلغاء',
        'confirm' => 'تأكيد',
    ],
];
