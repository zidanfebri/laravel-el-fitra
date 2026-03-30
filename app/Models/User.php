<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'username',
        'email',
        'no_telp',
        'password',
        'reset_password',
        'reset_password_token',
        'reset_password_expires_at',
        'role',
        'is_active',
        'activation_token'
    ];

    protected $hidden = [
        'password',
        'reset_password',
        'reset_password_token',
        'reset_password_expires_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'reset_password_expires_at' => 'datetime',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeUser($query)
    {
        return $query->where('role', 'user');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
}