<?php

namespace App\Actions;

use App\Contracts\CreatesNewUser;
use App\Models\User;

class CreateNewUser implements CreatesNewUser
{
    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input): User
    {
        return User::create($input);
    }
}
