<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username','real_name', 'email', 'password','school','github','major'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
