<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class ProyectoCarrera extends Model
{
    protected $table = 'proyecto_carrera';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id_proyecto',
    	'id_carrera'
    ];
    protected $guarded = [
    	//
    ];
}
