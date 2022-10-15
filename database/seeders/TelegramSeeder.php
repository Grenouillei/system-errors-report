<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Telegram;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TelegramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telegram = new Telegram();
        $telegram->token = '';
        $telegram->chat_id = '';
        $telegram->save();

    }
}
