<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                //1
                [
                    'title' => 'Administrator',
                    'alias' => 'administrator',
                ],
                //2
                [
                    'title' => 'Guest',
                    'alias' => 'guest',
                ]
            ]
        );
    }
}
