<?php

namespace App\Policies;

use App\Models\User;

class ProblemTypePolicy
{
    /**
     * Create a new policy instance.
     */
    public function interact(User $user)
    {
        return $user->hasRole('moderator');
    }
}
