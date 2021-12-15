<?php

namespace App\Actions\Fortify;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input): User
    {
        return User::create([
            'first_name'    => $input['first_name'],
            'last_name'     => $input['last_name'],
            'email'         => $input['email'],
            'mobile_number' => $input['mobile_number'],
            'password'      => $input['password'],
        ]);
    }
}
