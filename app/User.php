<?php

namespace tpiproject;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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
    
    public function pasantias()
    {
        return $this->hasMany('tpiproject\Pasantia');
    }

    public function proyectos()
    {
        return $this->hasMany('tpiproject\Proyecto');
    }

    public function admin()
    {
        return $this->tipo === 'Administrador';
    }
    
    public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
