<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Category $category): bool
    {
        if ($user->hasRole('super admin') || $user->hasRole('admin')) {
            return true;
        }

        return false;
    }


    public function create(User $user): bool
    {

        if ($user->hasRole('super admin') || $user->hasRole('admin')) {
            return true;
        }

        return false;
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): bool
    {
        if ($user->hasRole('super admin') || $user->hasRole('admin')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $category): bool
    {
        if ($user->hasRole('super admin') || $user->hasRole('admin')) {
            return true;
        }

        return false;
    }
}
