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
            $carreras = Carrera::orderBy('nombre', 'asc')->get();
            $proyectos = DB::table('proyectos as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_proyecto as pc', 'p.id', '=', 'pc.proyecto_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
                ->where('p.nombre', 'like', '%'.$query.'%')
                ->orwhere('p.descripcion', 'like', '%'.$query.'%')
                ->orwhere('u.ciudad', 'like', '%'.$query.'%')
                ->orderBy('p.created_at', 'desc')
                ->groupBy('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad')
                ->paginate(5);
            return view('buscar.proyecto.index', ["proyectos"=>$proyectos, "searchText"=>$query, "carreras"=>$carreras]);
    	}
    }

    public function show($id)
    {
        $proyecto = DB::table('proyectos as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_proyecto as pc', 'p.id', '=', 'pc.proyecto_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa', 'u.email', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web')
                ->where('p.id', '=', $id)
                ->first();
        $carreras = DB::table('carrera_proyecto as pc')
                ->join('carreras as c', 'pc.carrera_id', '=', 'c.id')
                ->select('c.nombre as carrera')
                ->where('pc.proyecto_id', '=', $id)
                ->get();
        return view('buscar.proyecto.show', ["proyecto"=>$proyecto, "carreras"=>$carreras]);
    }

    public function searchCarrera($id)
    {
        $query = "";
        $carreras = Carrera::orderBy('nombre', 'asc')->get();
        $carrera = Carrera::where('id', '=', $id)->first();
        $proyectos = $carrera->proyectos()
                //->join('users as u', 'proyectos.user_id', '=', 'u.id')
                //->select('u.empresa', 'u.email', 'u.ciudad')
                //->groupBy('u.empresa', 'u.email', 'u.ciudad')
                ->orderBy('proyectos.created_at', 'desc')
                ->paginate(5);
        return view('buscar.proyecto.index')
            ->with('proyectos', $proyectos)
            ->with('searchText', $query)
            ->with('carreras', $carreras);
        
    }
}
