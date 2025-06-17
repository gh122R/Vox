<?php

namespace App\Policies;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComplaintPolicy
{

    public function viewAll(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function viewAny(User $user, Complaint $complaint): bool
    {
        return $complaint->user->is($user) || $user->hasRole('admin');
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, Complaint $complaint): bool
    {
        return $complaint->user()->is($user) || $user->hasRole('admin') || $user->hasRole('moderator')  ;
    }

    public function destroy(User $user, Complaint $complaint): bool
    {
        return $complaint->user_id === $user->id || $user->hasRole('moderator');
    }
}
