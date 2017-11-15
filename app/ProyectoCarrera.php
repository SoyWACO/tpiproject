<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class ProyectoCarrera extends Model
{
    protected $table = 'carrera_proyecto';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'proyecto_id',
    	'carrera_id'
    ];
    protected $guarded = [
    	//
    ];
}
