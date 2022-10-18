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
        $project = $report->project->title;
        if($telegram){
            Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://api.telegram.org/bot$telegram->token/sendMessage",[
                'chat_id'=> $telegram->chat_id,
                'parse_mode' => 'HTML',
                'text'=>"Project: $project \nFile: $report->file \nLine: $report->line \nCode: $report->code"
            ]);
        }
    }
}
