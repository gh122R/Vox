<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;

class DepartmentPolicy
{
    public function interact(User $user)
    {
        return $user->hasRole('moderator');
    }
}
