<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'requirements' => 'nullable',
            'code_example' => 'required',
            'type' => 'required|string|max:255',
        ];
    }
}
