<?php

namespace App\Contracts;

use App\Models\User;

interface CreatesNewUser
{
    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input): User;

}
