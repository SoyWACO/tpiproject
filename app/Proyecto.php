<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
    	'id_empresa',
    	'nombre',
    	'descripcion',
    	'estado'
    ];
    protected $guarded = [
    	//
    ];
}