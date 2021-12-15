<?php

namespace App\Actions;

use App\Contracts\CreatesNewUser;
use App\Contracts\SetsPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SetUserPassword implements SetsPassword
{
    /**
     * Validate and create a newly registered user.
     *
     * @param string $password
     * @return bool
     */
    public function store($password): bool
    {
        return Auth::user()->update([
            'password' => $password
        ]);
    }
}
