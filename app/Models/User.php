<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\mongodb\Eloquent\Model as Eloquent; // usa este modelo para usar mongodb
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; // usa este modelo para autenticar usuarios

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use AuthenticatableTrait; // usa este modelo para autenticar usuarios
    protected $connection = 'mongodb'; // usa esta conexión para usar mongodb

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'usertype', // 1 = admin, 2 = vendedor, 3 = cliente
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
