<?php

   namespace App\Http\Requests\Tickets;

use App\Enums\TicketPriority;
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'department_id' => 'nullable|exists:ticket_departments,id',
            'priority' => ['nullable', 'in:' . implode(',', array_column(TicketPriority::cases(), 'value'))],
            'label_id' => 'nullable|exists:ticket_labels,id',

           ];
       }
   }
