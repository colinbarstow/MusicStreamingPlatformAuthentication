<?php

namespace App\Traits\Accessors;

use Illuminate\Support\Facades\Hash;

trait UserAccessor
{
    /**
     * Access the first name
     *
     * @param $value
     * @return string
     */
    public function getFirstNameAttribute($value): string
    {
        return ucfirst($value);
    }

    /**
     * Access the last name
     *
     * @param $value
     * @return string
     */
    public function getLastNameAttribute($value): string
    {
        return ucfirst($value);
    }

}
