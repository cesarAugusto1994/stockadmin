<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformations extends Model
{
    public function address()
    {
        return $this->hasOne(UserAddress::class, 'user_id');
    }

    public function phone()
    {
        return $this->hasOne(UserPhone::class, 'user_id');
    }

    public function identification()
    {
        return $this->hasOne(UserIdentification::class, 'user_id');
    }
}
