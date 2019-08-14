<?php

namespace App;

use Cog\Contracts\Love\Reacterable\Models\Reacterable as ReacterableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cog\Laravel\Love\Reacterable\Models\Traits\Reacterable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements ReacterableContract
{
    use Notifiable;
    use Reacterable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'birthday', 'address', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
