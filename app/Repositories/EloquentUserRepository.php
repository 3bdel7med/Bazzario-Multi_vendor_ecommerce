<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getActiveUsers()
    {
        return User::where('status', 'active')->orderBy('name')->get();
    }
}
