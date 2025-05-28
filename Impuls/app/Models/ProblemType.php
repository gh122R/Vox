<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProblemType extends Model
{
    /** @use HasFactory<\Database\Factories\ProblemTypeFactory> */
    use HasFactory;

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }
}

