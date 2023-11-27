<?php

namespace App\Policies;

use App\Models\User;

class RecipePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, \App\Models\Recipe $recipe): bool
    {
        return $user->id === $recipe->user_id;
    }

    public function delete(User $user, \App\Models\Recipe $recipe): bool
    {
        return $user->id === $recipe->user_id;
    }

    public function publish(User $user, \App\Models\Recipe $recipe): bool
    {
        return $user->id === $recipe->user_id;
    }

    public function rate(User $user, \App\Models\Recipe $recipe): bool
    {
        return $user->id !== $recipe->user_id;
    }
}
