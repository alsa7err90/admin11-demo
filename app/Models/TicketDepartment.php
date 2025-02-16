<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketDepartment extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(TicketDepartment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(TicketDepartment::class, 'parent_id');
    }
}
