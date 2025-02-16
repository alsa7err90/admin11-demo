<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'requirements',
        'code_example',
        'type',
        'can_run',
    ];
}
