<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'nombre'
    ];
    protected $guarded = [
    	//
    ];

    public function proyectos()
    {
    	return $this->belongsToMany('tpiproject\Proyecto')->withTimestamps();
    }

    public function pasantias()
    {
    	return $this->belongsToMany('tpiproject\Pasantia')->withTimestamps();
    }
}
