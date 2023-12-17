<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class RolePolicy
{

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list roles');
    }


    public function view(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('list roles');
    }


    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create roles');
    }


    public function update(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('edit roles');
    }

    public function delete(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('delete roles');
    }
}
