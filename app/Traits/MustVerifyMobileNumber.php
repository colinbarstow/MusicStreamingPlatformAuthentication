<?php

namespace App\Traits;

use App\Notifications\VerifyMobileNumber;

trait MustVerifyMobileNumber
{
    /**
     * Determine if the user has verified their mobile number.
     *
     * @return bool
     */
    public function hasVerifiedMobileNumber()
    {
        return ! is_null($this->mobile_number_verified_at);
    }

    /**
     * Mark the given user's mobile number as verified.
     *
     * @return bool
     */
    public function markMobileNumberAsVerified()
    {
        return $this->forceFill([
            'mobile_number_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the mobile number verification notification.
     *
     * @return void
     */
    public function sendMobileNumberVerificationNotification()
    {
        $this->notify(new VerifyMobileNumber);
    }

    /**
     * Get the mobile number that should be used for verification.
     *
     * @return string
     */
    public function getMobileNumberForVerification()
    {
        return $this->mobile_number;
    }
}
