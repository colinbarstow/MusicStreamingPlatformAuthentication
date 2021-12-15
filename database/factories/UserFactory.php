<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name'                => $firstname = $this->faker->firstName(),
            'last_name'                 => $lastName  = $this->faker->lastName(),
            'email'                     => "{$firstname}{$lastName}@music-cms.com",
            'mobile_number'             => 0 . rand(7000000000, 7999999999),
            'email_verified_at'         => now(),
            'mobile_number_verified_at' => now(),
            'password'                  => 'password', // password
            'remember_token'            => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
