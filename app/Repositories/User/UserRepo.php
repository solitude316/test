<?php
namespace App\Repositories\User;

use Ramsey\Uuid\Uuid;
use App\Models\Users;

class UserRepo
{
    private $salt;

    public function create($params)
    {
        $model = new Users;

        $model->id = Uuid::uuid4();
        $model->account = array_pull($params, 'account');
        $model->password = $this->hashPwd(array_pull($params, 'password'));
        $model->status = 1;
        $model->save();
        return $model;
    }

    public function search($filter)
    {
        $query = Users::query();
        foreach($filter as $column => $value) {
            switch ($column) {
                case 'account':
                    $query->where($column, $value);
                    break;
                case 'password':
                    $query->where('password', $this->hashPwd($value));
            }
        }

        return $query->get();
    }

    public function hashPwd($password)
    {
        return hash('sha256', "{$this->salt}{$password}");
    }
}