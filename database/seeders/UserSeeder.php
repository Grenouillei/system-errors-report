<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('admin');
        $user->remember_token = Str::random(10);
        $user->save();
        $user->roles()->attach(Role::ADMIN_ID);

    }
}
