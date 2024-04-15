<?php

namespace App\Policies;

use App\Models\Network;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NetworkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasPermissionTo('View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Network $network): bool
    {
        if ($user->hasPermissionTo('View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasPermissionTo('Create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Network $network): bool
    {
        if ($user->hasPermissionTo('Bulky')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Network $network): bool
    {
        if ($user->hasPermissionTo('Bulky')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Network $network): bool
    {
        if ($user->hasPermissionTo('Bulky')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Network $network): bool
    {
        if ($user->hasPermissionTo('Bulky')) {
            return true;
        }
        return false;
    }
}