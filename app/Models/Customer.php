<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
