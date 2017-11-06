<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class ProyectoCarrera extends Model
{
    protected $table = 'proyecto_carrera';
    protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
    	'id_proyecto',
    	'id_carrera'
    ];
    protected $guarded = [
    	//
    ];
}
