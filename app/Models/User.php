<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'username', 'email', 'no_telp', 'password', 'reset_password'
    ];

    protected $hidden = [
        'password', 'reset_password'
    ];
}