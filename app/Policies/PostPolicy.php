<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list posts');
    }


    public function view(User $user, Post $post): bool
    {
        return $user->hasPermissionTo('list posts');
    }


    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create posts');
    }


    public function update(User $user, Post $post): bool
    {
        return $user->hasRole('Admin') ||
            ($user->hasPermissionTo('edit posts') && $post->user_id === auth()->id());
    }


    public function delete(User $user, Post $post): bool
    {
        return $user->hasRole('Admin') ||
            ($user->hasPermissionTo('delete posts') && $post->user_id === auth()->id());
    }
}
