<?php

namespace galeriamedica;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeNombreUsuario($query, $nombre)
    {
        return $query->where('name', 'LIKE', "%$nombre%")
                     ->orWhere('username', 'LIKE', "%$nombre%");
    }

}
