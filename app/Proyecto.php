<?php

namespace tpiproject;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'user_id',
    	'nombre',
    	'descripcion'
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