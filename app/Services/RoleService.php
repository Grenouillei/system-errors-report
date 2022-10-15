<?php

namespace App\Services;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleService
{
    public function getAllRoles(){
        return Role::orderBy('created_at','DESC')->get();
    }

    public function store(RoleRequest $request,Role $role){
        $role->fill($request->only($role->getFillable()));
        $role->save();
    }

    public function delete(Role $role){
        $role->delete();
    }
}
