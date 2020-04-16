<?php
namespace App\Services\User;
use App\Repositories\User\UserRepo;
use App\Models\Users;
use Exception;

class AuthService
{
    public function doLogin($account, $password)
    {
        $repo = new UserRepo();

        $filter = [
            'account' => $account,
            'password' => $password
        ];

        $user = $repo->search($filter)->first();

        if (! $user instanceof Users) {
            throw new Exception ('帳號不存在');
        }

        if (!$user->isActive()) {
            throw new Exception ('帳號停用中');
        }

        return $user;
    }
}