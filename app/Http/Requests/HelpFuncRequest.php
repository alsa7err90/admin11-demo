<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpFuncRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'file_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable',
            'code_example' => 'nullable',

        ];
    }
}
