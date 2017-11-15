<?php

namespace tpiproject\Http\Controllers;

use Illuminate\Http\Request;

use tpiproject\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpiproject\Http\Requests\ProyectoFormRequest;
use DB;
use tpiproject\Proyecto;
use tpiproject\ProyectoCarrera;
use tpiproject\Carrera;
use tpiproject\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Response;

class BuscarProyectoController extends Controller
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
            $proyectos = DB::table('proyectos as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_proyecto as pc', 'p.id', '=', 'pc.proyecto_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
                ->where('p.nombre', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
                ->orwhere('p.descripcion', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
                ->orwhere('u.ciudad', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
                ->orderBy('p.created_at', 'desc')
                ->groupBy('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
                ->paginate(5);
            return view('buscar.proyecto.index', ["proyectos"=>$proyectos, "searchText"=>$query]);
    	}
    }

    public function show($id)
    {
        $proyecto = DB::table('proyectos as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_proyecto as pc', 'p.id', '=', 'pc.proyecto_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web')
                ->where('p.id', '=', $id)
                ->first();
        $carreras = DB::table('carrera_proyecto as pc')
                ->join('carreras as c', 'pc.carrera_id', '=', 'c.id')
                ->select('c.nombre as carrera')
                ->where('pc.proyecto_id', '=', $id)
                ->get();
        return view('buscar.proyecto.show', ["proyecto"=>$proyecto, "carreras"=>$carreras]);
    }
}
