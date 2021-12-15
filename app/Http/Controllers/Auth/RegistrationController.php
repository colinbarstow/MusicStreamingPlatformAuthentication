<?php

namespace App\Http\Controllers\Auth;

use App\Actions\CreateNewUser;
use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;

class RegistrationController extends Controller
{
    public function __invoke(StoreUserRequest $request, CreateNewUser $createNewUser)
    {
        event(new UserCreated($createNewUser->create($request->all())));
    }
}
