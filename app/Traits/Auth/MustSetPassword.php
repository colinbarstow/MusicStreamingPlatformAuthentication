<?php

namespace App\Traits\Auth;

use App\Notifications\SetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;

trait MustSetPassword
{
    public function hasSetPassword(): bool
    {
        return ! is_null($this->password_set_at);
    }

    public function markPasswordAsSet(): bool
    {
        return $this->forceFill([
            'password_set_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function sendSetPasswordNotification()
    {
        $this->notify(new SetPassword);
    }

}
