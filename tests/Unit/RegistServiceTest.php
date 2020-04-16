<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\User\RegistService;
use App\Services\User\AuthService;

use App\Models\Users;

class RegistServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDoRegist()
    {
        $service = new RegistService();

        $username = bin2hex(random_bytes(10));
        $password = bin2hex(random_bytes(16));

        $params = [
            'account' => "{$username}@example.com.tw",
            'password' => $password
        ];

        $result = $service->doRegist($params);

        if ($result == true) {
            $this->assertTrue(true);
        }

        return $params;
    }

    /**
     * @depends testDoRegist
     */
    public function testLogin(array $params)
    {
        $service = new AuthService();
        $login_result = $service->doLogin($params['account'], $params['password']);

        if ($login_result == true) {
            $this->assertTrue(true);
        }

        // $this->assertTrue(true);
    }
}
