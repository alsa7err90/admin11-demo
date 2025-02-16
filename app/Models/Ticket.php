<?php

namespace App\Models;

use App\Enums\TicketPriority;
use App\Traits\ImagesableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, ImagesableTrait;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status',
        'department_id',
        'label_id',
        'priority',
    ];

    protected $casts = [
        'priority' => TicketPriority::class, // هنا نقوم بتحويل الحقل priority لاستخدام enum
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class);
    }

    public function department()
    {
        return $this->belongsTo(TicketDepartment::class);
    }

    public function label()
    {
        return $this->belongsTo(TicketLabel::class);
    }

    public function assignedAdmin()
    {
        return $this->belongsTo(User::class, 'assigned_admin_id');
    }

}
