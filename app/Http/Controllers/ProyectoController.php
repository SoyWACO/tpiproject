<?php

namespace tpiproject\Http\Controllers;

use Illuminate\Http\Request;

use tpiproject\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpiproject\Http\Requests\ProyectoFormRequest;
use DB;
use tpiproject\Proyecto;
use tpiproject\Carrera;
use tpiproject\ProyectoCarrera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Response;

class ProyectoController extends Controller
{
    public function __construct()
    {
    	$this->middleware("auth");
    }
    
    public function index(Request $request)
    {
        if ($request)
        {
            $id_empresa = Auth::user()->id;
            $query = trim($request->get('searchText'));
            $proyectos = DB::table('proyectos as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_proyecto as pc', 'p.id', '=', 'pc.proyecto_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa')
                ->where('p.nombre', 'like', '%'.$query.'%')
    			->where('p.user_id', '=', $id_empresa)
    			->orderBy('p.id', 'desc')
                ->groupBy('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa')
    			->paginate(10);
    		return view('ofertas.proyecto.index', ["proyectos"=>$proyectos, "searchText"=>$query]);
    	}
    }
    
    public function create()
    {
        $id_empresa = Auth::user()->id;
        $carreras = DB::table('carreras as car')
            ->orderBy('nombre', 'asc')
            ->lists('car.nombre', 'car.id');
        return view('ofertas.proyecto.create', ["empresa"=>$id_empresa, "carreras"=>$carreras]);
    }
    
    public function store(ProyectoFormRequest $request)
    {
        $proyecto = new Proyecto($request->all());
        $proyecto->save();
        
        $proyecto->carreras()->sync($request->carrera_id);

        return Redirect::to('ofertas/proyecto');
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
        return view('ofertas.proyecto.show', ["proyecto"=>$proyecto, "carreras"=>$carreras]);
    }
    
    public function edit($id)
    {	
        $tcarreras = DB::table('carreras as car')
                ->orderBy('nombre', 'asc')
                ->lists('car.nombre', 'car.id');
        $carreras = DB::table('carrera_proyecto as pc')
                ->join('carreras as c', 'pc.carrera_id', '=', 'c.id')
                ->where('pc.proyecto_id', '=', $id)
                ->lists('c.id');
        return view('ofertas.proyecto.edit', ["proyecto"=>Proyecto::findOrFail($id), "carreras"=>$carreras, "tcarreras"=>$tcarreras]);
    }
    
    public function update(ProyectoFormRequest $request, $id)
    {

        $proyecto = Proyecto::find($id);
        $proyecto->fill($request->all());
        $proyecto->save();

        $proyecto->carreras()->sync($request->carrera_id);
        
        return Redirect::to('ofertas/proyecto');
    }
    
    public function destroy($id)
    {
   		$proyecto = DB::table('proyectos')->where('id', '=', $id)->delete();
        return Redirect::to('ofertas/proyecto');
        /*
        $proyecto = Proyecto::findOrFail($id);
   		$proyecto->estado = 'No disponible';
   		$proyecto->update();
   		return Redirect::to('ofertas/proyecto');
        */
    }
}
