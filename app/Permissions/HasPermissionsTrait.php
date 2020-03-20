<?php

namespace App\Permissions;
use App\Role;
use App\Permission;
trait HasPermissionsTrait{
    public function hasRole(...$roles){

        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }

        return false;

    }
    public function roles(){
        $this->belongsToMany(Role::class,'users_roles');

    }
    public function Permissions(){
         $this->belongsToMany(Permission::class,'users_permissions');
    }
}
