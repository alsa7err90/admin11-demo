<?php

namespace App\Http\Requests\Tickets;

use Illuminate\Foundation\Http\FormRequest;

class AssignAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // يمكنك تعديلها حسب صلاحيات المستخدم
    }

    public function rules(): array
    {
        return [
            'assigned_admin_id' => 'required|exists:users,id',
        ];
    }
}
