<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function getAllUsers(){
        return User::orderBy('created_at','DESC')->get();
    }

    public function store(Request $request,User $user){
        $user->fill($request->only($user->getFillable()));
        $user->save();
    }

    public function delete(User $user){
        $user->delete();
    }
}
