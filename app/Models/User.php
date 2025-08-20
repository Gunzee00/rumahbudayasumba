<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // kalau mau pakai Sanctum

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users'; // pastikan tabelnya benar

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
