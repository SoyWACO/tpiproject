<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';
    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $fillable = [
    	'nombre'
    ];
    protected $guarded = [
    	//
    ];
}
