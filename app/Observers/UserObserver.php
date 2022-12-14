<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->roles()->attach(Role::GUEST_ID);
    }
}
