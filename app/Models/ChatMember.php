<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMember extends Model
{
    public $timestamps = false;

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        return $this->role = $role;
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }
}
