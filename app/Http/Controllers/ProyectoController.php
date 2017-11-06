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
                ->join('users as u', 'p.id_empresa', '=', 'u.id')
                ->join('proyecto_carrera as pc', 'p.id', '=', 'pc.id_proyecto')
                ->select('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa')
                ->where('p.nombre', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
    			->where('p.id_empresa', '=', $id_empresa)
    			->orderBy('p.id', 'desc')
                ->groupBy('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa')
    			->paginate(10);
    		return view('ofertas.proyecto.index', ["proyectos"=>$proyectos, "searchText"=>$query]);
    	}
    }
    public function create()
    {
        $id_empresa = Auth::user()->id;
        $carreras = DB::table('carreras as car')
            ->select('car.id', 'car.nombre')
            ->get();
        return view('ofertas.proyecto.create', ["empresa"=>$id_empresa, "carreras"=>$carreras]);
    }
    public function store(ProyectoFormRequest $request)
    {
    	try {
            DB::beginTransaction();
                $id_empresa = Auth::user()->id;
                $proyecto = new Proyecto;
            	$proyecto->id_empresa = $id_empresa;
            	$proyecto->nombre = $request->get('nombre');
            	$proyecto->descripcion = $request->get('descripcion');
            	$proyecto->estado = 'Disponible';
            	$proyecto->save();

                $id_carrera = $request->get('id_carrera');

                $cont = 0;
                while ($cont < count($id_carrera)) {
                    $proyecto_carrera = new ProyectoCarrera();
                    $proyecto_carrera->id_proyecto = $proyecto->id;
                    $proyecto_carrera->id_carrera = $id_carrera[$cont];
                    $proyecto_carrera->save();
                    $cont = $cont+1;
                }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }

    	return Redirect::to('ofertas/proyecto');
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
        return view('ofertas.proyecto.show', ["proyecto"=>$proyecto, "carreras"=>$carreras]);
    }
    
    public function edit($id)
    {
    	$tcarreras = DB::table('carreras as car')
                ->select('car.id', 'car.nombre')
                ->get();
        $carreras = DB::table('proyecto_carrera as pc')
                ->join('carreras as c', 'pc.id_carrera', '=', 'c.id')
                ->select('c.nombre', 'c.id')
                ->where('pc.id_proyecto', '=', $id)
                ->get();
        return view('ofertas.proyecto.edit', ["proyecto"=>Proyecto::findOrFail($id), "carreras"=>$carreras, "tcarreras"=>$tcarreras]);
    }
    public function update(ProyectoFormRequest $request, $id)
    {
    	try {
            DB::beginTransaction();
                $proyecto = Proyecto::findOrFail($id);
                $proyecto->nombre = $request->get('nombre');
                $proyecto->descripcion = $request->get('descripcion');
                $proyecto->update();

                $id_carrera = $request->get('id_carrera');

                $cont = 0;
                while ($cont < count($id_carrera)) {
                    $proyecto_carrera = new ProyectoCarrera();
                    $proyecto_carrera->id_proyecto = $proyecto->id;
                    $proyecto_carrera->id_carrera = $id_carrera[$cont];
                    $proyecto_carrera->save();
                    $cont = $cont+1;
                }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }

        return Redirect::to('ofertas/proyecto');
    }
    
    public function destroy($id)
    {
   		$proyecto = Proyecto::findOrFail($id);
   		$proyecto->estado = 'No disponible';
   		$proyecto->update();
   		return Redirect::to('ofertas/proyecto');
    }
}
