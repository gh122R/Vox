<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function interact(User $user): bool
    {
        return $user->hasRole('moderator');
    }
}
