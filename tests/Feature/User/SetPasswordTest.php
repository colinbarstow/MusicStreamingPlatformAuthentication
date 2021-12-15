<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SetPasswordTest extends TestCase
{
    use WithoutMiddleware;

    public function testUserCanAccessSetPasswordView()
    {
        $res = $this->get('set-password/1/3bace17e2d6ae516a7c196afca0a425f12dad0f0?expires=1639263600&signature=5e3b7641d437e63a1d475c7fa9ef47dcc281f7c215e649d150809acdde8b9cd7');

        $res->assertStatus(200);
    }

    public function testUserCanSetPassword()
    {
        $password = [
            'password'              => 'password',
            'password_confirmation' => 'password',
        ];


        $res = $this->post('/set-password', $password);

        $res->assertStatus(200);
    }
}
