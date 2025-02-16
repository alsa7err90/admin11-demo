<?php

namespace App\Enums;

enum TicketStatus: string
{
    case Open = '1';
    case InProgress = '2';
    case Closed = '3';

    // يمكنك إضافة دالة لوصف الحالة بشكل نصي
    public function label(): string
    {
        return match ($this) {
            self::Open => 'Open',
            self::InProgress => 'In Progress',
            self::Closed => 'Closed',
        };
    }
}
