<?php

namespace App\Policies;

use App\Models\Specialization;
use App\Models\User;

class SpecializationPolicy
{
    /**
     * Create a new policy instance.
     */

    public function interact(User $user)
    {
        return $user->hasRole('moderator') || $user->hasRole('admin');
    }
}
