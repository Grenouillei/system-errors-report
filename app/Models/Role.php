<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable  = [
        'title',
        'alias',
    ];

    const ADMIN_ID = 1;
    const GUEST_ID = 2;
}
