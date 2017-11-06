<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class PasantiaCarrera extends Model
{
    protected $table = 'pasantia_carrera';
    protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
    	'id_pasantia',
    	'id_carrera'
    ];
    protected $guarded = [
    	//
    ];
}
