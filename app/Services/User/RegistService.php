<?php
namespace App\Services\User;
use Exception, QueryException, Log;
use App\Repositories\User\UserRepo;
use App\Models\Users;

class RegistService
{
    public function doRegist($params)
    {
        $repo = new UserRepo();
        try {
            $user = $repo->create($params);

            if (! $user instanceof Users) {
                throw new Exception('帳號無法註冊');
            }

            return true;
        } catch (QueryException $exception){
            Log::error($exception);
            throw new Exception('系統忙碌中');
        }

        return false;
    }
}