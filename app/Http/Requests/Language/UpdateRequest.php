<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'nullable',
            'name' => 'required',
            'icon' => 'nullable',
            'translations' => 'nullable|array', // تأكد من أن الحقل هو مصفوفة
            'translations.*' => 'nullable|string',
            'newTranslationKey' => 'nullable',

        ];
    }
}
