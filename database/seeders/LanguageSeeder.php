<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Language::count() == 0) {
            // إضافة اللغة العربية
            Language::create([
                'code' => 'ar',
                'name' => 'العربية',
                'is_default' => true, // اجعلها اللغة الافتراضية
                'is_enable' => true,
                'icon' => '🇸🇦', // يمكنك استخدام أي رمز تعبيري أو مسار صورة
            ]);

            // إضافة اللغة الإنجليزية
            Language::create([
                'code' => 'en',
                'name' => 'English',
                'is_default' => false,
                'is_enable' => true,
                'icon' => '🇬🇧', // يمكنك استخدام أي رمز تعبيري أو مسار صورة
            ]);
        }
    }
}
