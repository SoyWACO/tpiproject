<?php

namespace tpiproject\Http\Controllers;

use Illuminate\Http\Request;

use tpiproject\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpiproject\Http\Requests\ProyectoFormRequest;
use DB;
use tpiproject\Pasantia;
use tpiproject\PasantiaCarrera;
use tpiproject\Carrera;
use tpiproject\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Response;

class BuscarPasantiaController extends Controller
{
    public function __construct()
    {
    	//
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query = trim($request->get('searchText'));
            $pasantias = DB::table('pasantias as p')
                ->join('users as u', 'p.id_empresa', '=', 'u.id')
                ->join('pasantia_carrera as pc', 'p.id', '=', 'pc.id_pasantia')
                ->select('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
                ->where('p.nombre', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
                ->orwhere('p.descripcion', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
                ->orwhere('u.ciudad', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
    			->orderBy('p.created_at', 'desc')
                ->groupBy('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
    			->paginate(5);
    		return view('buscar.pasantia.index', ["pasantias"=>$pasantias, "searchText"=>$query]);
    	}
    }

    public function show($id)
    {  
    	$pasantia = DB::table('pasantias as p')
                ->join('users as u', 'p.id_empresa', '=', 'u.id')
                ->join('pasantia_carrera as pc', 'p.id', '=', 'pc.id_pasantia')
                ->select('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.sexo', 'p.duracion', 'p.unidad_duracion', 'p.edad_inicial', 'p.edad_final', 'p.idioma', 'p.pago', 'p.estado', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web')
                ->where('p.id', '=', $id)
                ->first();
        $carreras = DB::table('pasantia_carrera as pc')
                ->join('carreras as c', 'pc.id_carrera', '=', 'c.id')
                ->select('c.nombre as carrera')
                ->where('pc.id_pasantia', '=', $id)
                ->get();
        return view('buscar.pasantia.show', ["pasantia"=>$pasantia, "carreras"=>$carreras]);
    }
}
