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
                ->join('users as u', 'p.id_empresa', '=', 'u.id')
                ->join('proyecto_carrera as pc', 'p.id', '=', 'pc.id_proyecto')
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
            return view('buscar.proyecto.index', ["proyectos"=>$proyectos, "searchText"=>$query]);
    	}
    }

    public function show($id)
    {
        $proyecto = DB::table('proyectos as p')
                ->join('users as u', 'p.id_empresa', '=', 'u.id')
                ->join('proyecto_carrera as pc', 'p.id', '=', 'pc.id_proyecto')
                ->select('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web')
                ->where('p.id', '=', $id)
                ->first();
        $carreras = DB::table('proyecto_carrera as pc')
                ->join('carreras as c', 'pc.id_carrera', '=', 'c.id')
                ->select('c.nombre as carrera')
                ->where('pc.id_proyecto', '=', $id)
                ->get();
        return view('buscar.proyecto.show', ["proyecto"=>$proyecto, "carreras"=>$carreras]);
    }
}
