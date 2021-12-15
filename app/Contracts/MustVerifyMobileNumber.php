<?php

namespace App\Contracts;

interface MustVerifyMobileNumber
{
    /**
     * Determine if the user has verified their mobile number.
     *
     * @return bool
     */
    public function hasVerifiedMobileNumber();

    /**
     * Mark the given user's mobile number as verified.
     *
     * @return bool
     */
    public function markMobileNumberAsVerified();

    /**
     * Send the mobile number verification notification.
     *
     * @return void
     */
    public function sendMobileNumberVerificationNotification();

    /**
     * Get the mobile number that should be used for verification.
     *
     * @return string
     */
    public function getMobileNumberForVerification();
}
