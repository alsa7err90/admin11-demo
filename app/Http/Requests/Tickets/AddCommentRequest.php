<?php

namespace App\Http\Requests\Tickets;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // يمكنك تعديلها حسب صلاحيات المستخدم
    }

    public function rules(): array
    {
        return [
            'comment' => 'required|string',
        ];
    }
}
