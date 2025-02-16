<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'button_label' => 'nullable',
            'button_link' => 'nullable',
            'template_name' => 'required',
            'video_link' => 'nullable', // تحقق من صحة الرابط
            'second_button_label' => 'nullable|string',
            'second_button_link' => 'nullable',
            'expires_at' => 'nullable|date', // تحقق من صحة تاريخ الانتهاء
            'status' => 'nullable|boolean',
        ];
    }
}
