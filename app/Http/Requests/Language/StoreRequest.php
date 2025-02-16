<?php

   namespace App\Http\Requests\Language;

   use Illuminate\Foundation\Http\FormRequest;

   class StoreRequest extends FormRequest
   {
       public function authorize()
       {
           return true;
       }

       public function rules()
       {
           return [
            'code' => 'required|string|max:2',
            'name' => 'required|string|max:10',
            'is_default' => 'nullable',
            'is_enable' => 'nullable',
            'icon' => 'nullable'
           ];
       }
   }
