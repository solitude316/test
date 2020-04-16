<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function isActive()
    {
        return ($this->status == self::STATUS_ACTIVE);
    }
}
