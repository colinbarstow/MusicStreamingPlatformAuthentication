<?php

namespace App\Listeners;

use App\Contracts\MustSetPassword;
use App\Events\UserCreated;

class SendSetPasswordNotification
{
    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        if ($event->user instanceof MustSetPassword && ! $event->user->hasSetPassword()) {
            $event->user->sendSetPasswordNotification();
        }
    }
}
