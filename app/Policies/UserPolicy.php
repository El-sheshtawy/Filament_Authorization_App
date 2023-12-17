<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list users');
    }

    public function view(User $user, User $model): bool
    {
        return $user->hasRole('Admin') || ($user->hasPermissionTo('list users') && $user->is($model));
    }


    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create users');
    }


    public function update(User $user, User $model): bool
    {
        return $user->hasRole('Admin') || ($user->hasPermissionTo('edit users') && $user->is($model));
    }

    public function delete(User $user, User $model): bool
    {
        return $user->hasRole('Admin') || ($user->hasPermissionTo('delete users') && $user->is($model));
    }
}
