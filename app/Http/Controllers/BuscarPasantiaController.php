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
            $carreras = Carrera::orderBy('nombre', 'asc')->get();
            $pasantias = DB::table('pasantias as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_pasantia as pc', 'p.id', '=', 'pc.pasantia_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
                ->where('p.nombre', 'like', '%'.$query.'%')
                ->orwhere('p.descripcion', 'like', '%'.$query.'%')
                ->orwhere('u.ciudad', 'like', '%'.$query.'%')
    			->orderBy('p.created_at', 'desc')
                ->groupBy('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
    			->paginate(5);
    		return view('buscar.pasantia.index', ["pasantias"=>$pasantias, "searchText"=>$query, "carreras"=>$carreras]);
    	}
    }

    public function show($id)
    {  
    	$pasantia = DB::table('pasantias as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_pasantia as pc', 'p.id', '=', 'pc.pasantia_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.sexo', 'p.duracion', 'p.unidad_duracion', 'p.edad_inicial', 'p.edad_final', 'p.idioma', 'p.pago', 'p.tiempo_pago', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web')
                ->where('p.id', '=', $id)
                ->first();
        $carreras = DB::table('carrera_pasantia as pc')
                ->join('carreras as c', 'pc.carrera_id', '=', 'c.id')
                ->select('c.nombre as carrera')
                ->where('pc.pasantia_id', '=', $id)
                ->get();
        return view('buscar.pasantia.show', ["pasantia"=>$pasantia, "carreras"=>$carreras]);
    }

    public function searchCarrera($id)
    {
        $query = "";
        $carreras = Carrera::orderBy('nombre', 'asc')->get();
        $carrera = Carrera::where('id', '=', $id)->first();
        $pasantias = $carrera->pasantias()
                //->join('users as u', 'pasantias.user_id', '=', 'u.id')
                //->select('u.empresa', 'u.email', 'u.ciudad')
                //->groupBy('u.empresa', 'u.email', 'u.ciudad')
                ->orderBy('pasantias.created_at', 'desc')
                ->paginate(5);
        return view('buscar.pasantia.index')
            ->with('pasantias', $pasantias)
            ->with('searchText', $query)
            ->with('carreras', $carreras);
        
    }
}
