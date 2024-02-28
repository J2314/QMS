<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_code',
        'file_name',
        'department_id',
        'is_removed',
    ];
}
