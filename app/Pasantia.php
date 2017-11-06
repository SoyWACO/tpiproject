<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class Pasantia extends Model
{
    protected $table = 'pasantias';
    protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
    	'id_empresa',
    	'nombre',
    	'descripcion',
    	'sexo',
    	'duracion',
    	'unidad_duracion',
    	'edad_inicial',
    	'edad_final',
    	'idioma',
    	'pago',
    	'estado'
    ];
    protected $guarded = [
    	//
    ];
}
