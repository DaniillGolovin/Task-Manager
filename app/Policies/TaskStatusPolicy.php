<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;

class TaskStatusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(): bool
    {
        return Auth::check();
    }
}
