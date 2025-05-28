<?php

namespace App\Policies;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComplaintPolicy
{

  /*  public function viewAny(User $user): bool
    {
        //
    }*/

    public function view(User $user, Complaint $complaint): bool
    {
        return $complaint->user->is($user);
    }
}
