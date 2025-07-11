<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StatusPolicy
{
    public function interact(User $user): bool
    {
        return $user->hasRole('moderator');
    }
}
