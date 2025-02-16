<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'button_label',
        'button_link',
        'status',
        'template_name',
    ];
}
