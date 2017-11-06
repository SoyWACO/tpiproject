<?php

namespace tpiproject;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'empresa', 'ciudad', 'direccion', 'sector', 'telefono', 'web', 'tipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function proyectos()
    {
        return $this->hasMany('tpiproject\Proyecto');
    }
    public function pasantias()
    {
        return $this->hasMany('tpiproject\Pasantia');
    }
}
