<?php

namespace App\Contracts;

interface MustSetPassword
{
    /**
     * Determine if the user has set their password.
     *
     * @return bool
     */
    public function hasSetPassword(): bool;

    /**
     * Mark the given user's password as set.
     *
     * @return bool
     */
    public function markPasswordAsSet(): bool;

    /**
     * Send the password set notification.
     *
     * @return void
     */
    public function sendSetPasswordNotification();

}
