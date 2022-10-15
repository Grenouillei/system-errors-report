<?php

namespace App\Observers;

use App\Models\Report;
use App\Models\Telegram;
use Illuminate\Support\Facades\Http;

class ReportObserver
{
    public function created(Report $report)
    {
        $telegram = Telegram::getInstance();
        if($telegram){
            Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://api.telegram.org/bot$telegram->token/sendMessage",[
                'chat_id'=> $telegram->chat_id,
                'parse_mode' => 'HTML',
                'text'=>"1"
            ]);
        }
    }
}
