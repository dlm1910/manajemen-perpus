<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable

{

    protected $fillable = [
    'name',
    'email',
    'password',
    'role',
];

public function isAdmin()
{
    return $this->role === 'admin';
}


    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function anggota()
{
    // Tambahkan 'user_id' sebagai foreign key
    return $this->belongsTo(Anggota::class, 'user_id');
}
}
