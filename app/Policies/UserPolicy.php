<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if ($user->isIT()) {
            return true;
        }

        // Filter users for managers (exclude IT users)
        if ($user->isManager()) {
            return User::where('position', '!==', 'System IT')->get();
        }

        // Default to denying view access
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        // Allow IT to view all users, including managers
        if ($user->isIT()) {
            return true;
        }

        // Allow managers to view all users except IT
        if ($user->isManager() && !$model->isIT()) {
            return true;
        }

        // Default to denying view access
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasPermissionTo('View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // Allow IT to edit all users, including managers
        if ($user->isIT()) {
            return true;
        }

        // Allow managers to edit users other than IT
        if ($user->isManager() && !$model->isIT()) {
            return true;
        }

        // Default to denying edit access
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Allow IT to view all users, including managers
        if ($user->isIT() && !$model->isIT()) {
            return true;
        }

        // Allow managers to delete all users except IT
        if ($user->isManager() && !$model->isIT() && !$model->isMAnager()) {
            return true;
        }

        // Default to denying view access
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        if ($user->hasPermissionTo('Bulky')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        if ($user->hasPermissionTo('Bulky')) {
            return true;
        }
        return false;
    }
}
