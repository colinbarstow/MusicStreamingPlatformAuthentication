<?php

namespace App\Contracts;

use App\Models\User;

interface SetsPassword
{
    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function store(array $input): User;

}
