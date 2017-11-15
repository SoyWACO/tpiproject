<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class Pasantia extends Model
{
    protected $table = 'pasantias';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'user_id',
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

    public function user()
    {
        return $this->belongsTo('tpiproject\User');
    }

    public function carreras()
    {
        return $this->belongsToMany('tpiproject\Carrera');
    }
}
