<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{

    use HasFactory;

    protected $fillable = [
        'token',
        'chat_id',
        'message'
    ];

    public static function getInstance(){
        return Telegram::where('id',1)->first();
    }
}
