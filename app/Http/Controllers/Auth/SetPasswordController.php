<?php

namespace App\Http\Controllers\Auth;

use App\Actions\SetUserPassword;
use App\Events\PasswordSet;
use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\SetPasswordRequest;
use App\Http\Requests\StorePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class SetPasswordController extends Controller
{
    public function create(SetPasswordRequest $request)
    {

        if ($request->user()->hasSetPassword()) {
            return $request->wantsJson()
                ? new JsonResponse('', 204)
                : redirect()->intended(User::redirects('password-set').'?verified=1');
        }

//        return $request->wantsJson()
//            ? new JsonResponse('', 202)
//            : redirect()->intended(User::redirects('password-set').'?verified=1');

        return view('auth.set-password');
    }

    public function store(StorePasswordRequest $request, SetUserPassword $setUserPassword)
    {
        event(new PasswordSet($setUserPassword->create($request->password)));
    }
}
