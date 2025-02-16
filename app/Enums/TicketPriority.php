<?php

namespace App\Enums;

enum TicketPriority: string
{
    case Low = '1';
    case Medium = '2';
    case High = '3';

    // يمكنك إضافة وصف لكل مستوى أولوية
    public function label(): string
    {
        return match($this) {
            self::Low => 'Low Priority',
            self::Medium => 'Medium Priority',
            self::High => 'High Priority',
        };
    }
}
