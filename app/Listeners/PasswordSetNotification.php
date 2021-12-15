<?php

namespace App\Listeners;

use App\Events\PasswordSet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PasswordSetNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PasswordSet  $event
     * @return void
     */
    public function handle(PasswordSet $event)
    {
        //
    }
}
