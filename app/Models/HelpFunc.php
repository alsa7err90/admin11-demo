<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpFunc extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'code_example',
        'file_name',
        'type',
        'can_run',
    ];
}
