<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        // هنا تحدد إذا كان المستخدم مخولًا لعمل هذا الطلب
        return true;
    }

    public function rules()
    {
        return [
            'key' => 'required|string|unique:settings',
            'value' => 'required|string',
        ];
    }
}
