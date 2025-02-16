<?php

return [

    /*
    |--------------------------------------------------------------------------
    | إعدادات النظام العامة
    |--------------------------------------------------------------------------
    |
    | يحتوي هذا الملف على الإعدادات الافتراضية التي يمكن تعديلها حسب الحاجة.
    | يتم تحميل هذا الملف تلقائيًا في `CoreServiceProvider`.
    |
    */

    // معلومات الموقع
    'site_name' => env('APP_NAME', 'My Multi-Vendor Store'),
    'site_url' => env('APP_URL', 'http://localhost'),

    // إعدادات اللغة والمنطقة الزمنية
    'default_locale' => env('APP_LOCALE', 'en'),
    'default_timezone' => env('APP_TIMEZONE', 'UTC'),

    // إعدادات العملة
    'default_currency' => env('CURRENCY', 'USD'),
    'currency_symbol' => env('CURRENCY_SYMBOL', '$'),

    // إعدادات التخزين
    'storage' => [
        'disk' => env('FILESYSTEM_DISK', 'local'),
        'upload_path' => 'uploads/',
        'max_upload_size' => 5 * 1024, // 5MB
    ],

    // إعدادات البريد
    'mail' => [
        'default_sender' => env('MAIL_FROM_ADDRESS', 'no-reply@example.com'),
        'default_name' => env('MAIL_FROM_NAME', 'My Store'),
    ],

    // إعدادات الكاش (التخزين المؤقت)
    'cache' => [
        'enabled' => env('CACHE_ENABLED', true),
        'lifetime' => env('CACHE_LIFETIME', 60), // بالدقائق
    ],

    // إعدادات التصفح والـ Pagination
    'pagination_limit' => env('PAGINATION_LIMIT', 10),

    // إعدادات تسجيل المستخدمين
    'registration' => [
        'enabled' => env('REGISTRATION_ENABLED', true),
        'default_role' => env('DEFAULT_USER_ROLE', 'customer'),
    ],

    // إعدادات تسجيل الدخول
    'authentication' => [
        'session_lifetime' => env('SESSION_LIFETIME', 120), // بالدقائق
        'throttle_attempts' => env('AUTH_THROTTLE_ATTEMPTS', 5),
        'throttle_timeout' => env('AUTH_THROTTLE_TIMEOUT', 60), // بالثواني
    ],

    // إعدادات الدفع
    'payment' => [
        'default_gateway' => env('PAYMENT_GATEWAY', 'stripe'),
        'currency' => env('PAYMENT_CURRENCY', 'USD'),
        'tax_rate' => env('TAX_RATE', 0.15), // 15%
    ],

    // إعدادات الشحن
    'shipping' => [
        'default_method' => env('SHIPPING_METHOD', 'standard'),
        'flat_rate' => env('SHIPPING_FLAT_RATE', 5.00), // رسوم الشحن الثابتة
        'free_shipping_threshold' => env('FREE_SHIPPING_THRESHOLD', 50.00), // شحن مجاني عند تجاوز هذا المبلغ
    ],

    // إعدادات الحماية
    'security' => [
        'password_min_length' => env('PASSWORD_MIN_LENGTH', 8),
        'password_must_include_numbers' => env('PASSWORD_INCLUDE_NUMBERS', true),
        'password_must_include_special_chars' => env('PASSWORD_INCLUDE_SPECIAL_CHARS', true),
    ],

    // إعدادات API
    'api' => [
        'rate_limit' => env('API_RATE_LIMIT', 60), // الطلبات المسموحة في الدقيقة
        'token_lifetime' => env('API_TOKEN_LIFETIME', 1440), // بالدقائق
    ],

    // إعدادات الدعم الفني
    'support' => [
        'email' => env('SUPPORT_EMAIL', 'support@example.com'),
        'phone' => env('SUPPORT_PHONE', '+123456789'),
        'working_hours' => env('SUPPORT_WORKING_HOURS', '9 AM - 5 PM'),
    ],

];
