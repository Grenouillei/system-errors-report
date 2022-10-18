<?php

namespace App\Services;

use App\Models\Telegram;
use Illuminate\Http\Request;

class TelegramService
{

    public function store(Request $request,Telegram $telegram){
        $telegram->fill($request->only($telegram->getFillable()));
        $telegram->save();
    }
}
