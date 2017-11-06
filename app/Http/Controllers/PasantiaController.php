<?php

namespace tpiproject\Http\Controllers;

use Illuminate\Http\Request;

use tpiproject\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpiproject\Http\Requests\PasantiaFormRequest;
use DB;
use tpiproject\Pasantia;
use tpiproject\PasantiaCarrera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Response;

class PasantiaController extends Controller
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
            $pasantias = DB::table('pasantias as p')
                ->join('users as u', 'p.id_empresa', '=', 'u.id')
                ->join('pasantia_carrera as pc', 'p.id', '=', 'pc.id_pasantia')
                ->select('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa')
                ->where('p.nombre', 'like', '%'.$query.'%')
                ->where('p.estado', '=', 'Disponible')
    			->where('p.id_empresa', '=', $id_empresa)
    			->orderBy('p.id', 'desc')
                ->groupBy('p.id', 'p.id_empresa', 'p.nombre', 'p.descripcion', 'p.estado', 'p.created_at', 'u.empresa')
    			->paginate(10);
    		return view('ofertas.pasantia.index', ["pasantias"=>$pasantias, "searchText"=>$query]);
    	}
    }
    public function create()
    {
        $id_empresa = Auth::user()->id;
        $carreras = DB::table('carreras as car')
            ->select('car.id', 'car.nombre')
            ->get();
        return view('ofertas.pasantia.create', ["empresa"=>$id_empresa, "carreras"=>$carreras]);
    }
    public function store(PasantiaFormRequest $request)
    {
    	try {
            DB::beginTransaction();
                $id_empresa = Auth::user()->id;
                $pasantia = new Pasantia;
            	$pasantia->id_empresa = $id_empresa;
            	$pasantia->nombre = $request->get('nombre');
            	$pasantia->descripcion = $request->get('descripcion');
            	$pasantia->sexo = $request->get('sexo');
            	$pasantia->duracion = $request->get('duracion');
            	$pasantia->unidad_duracion = $request->get('unidad_duracion');
            	$pasantia->edad_inicial = $request->get('edad_inicial');
            	$pasantia->edad_final = $request->get('edad_final');
            	$pasantia->idioma = $request->get('idioma');
            	$pasantia->pago = $request->get('pago');
            	$pasantia->estado = 'Disponible';
            	$pasantia->save();

                $id_carrera = $request->get('id_carrera');

                $cont = 0;
                while ($cont < count($id_carrera)) {
                    $pasantia_carrera = new PasantiaCarrera();
                    $pasantia_carrera->id_pasantia = $pasantia->id;
                    $pasantia_carrera->id_carrera = $id_carrera[$cont];
                    $pasantia_carrera->save();
                    $cont = $cont+1;
                }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }

    	return Redirect::to('ofertas/pasantia');
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
        return view('ofertas.pasantia.show', ["pasantia"=>$pasantia, "carreras"=>$carreras]);
    }
    
    public function edit($id)
    {
    	$tcarreras = DB::table('carreras as car')
                ->select('car.id', 'car.nombre')
                ->get();
        $carreras = DB::table('pasantia_carrera as pc')
                ->join('carreras as c', 'pc.id_carrera', '=', 'c.id')
                ->select('c.nombre', 'c.id')
                ->where('pc.id_pasantia', '=', $id)
                ->get();
        return view('ofertas.pasantia.edit', ["pasantia"=>Pasantia::findOrFail($id), "carreras"=>$carreras, "tcarreras"=>$tcarreras]);
    }
    public function update(PasantiaFormRequest $request, $id)
    {
    	try {
            DB::beginTransaction();
                $pasantia = Pasantia::findOrFail($id);
                $pasantia->nombre = $request->get('nombre');
                $pasantia->descripcion = $request->get('descripcion');
                $pasantia->sexo = $request->get('sexo');
            	$pasantia->duracion = $request->get('duracion');
            	$pasantia->unidad_duracion = $request->get('unidad_duracion');
            	$pasantia->edad_inicial = $request->get('edad_inicial');
            	$pasantia->edad_final = $request->get('edad_final');
            	$pasantia->idioma = $request->get('idioma');
            	$pasantia->pago = $request->get('pago');
                $pasantia->update();

                $id_carrera = $request->get('id_carrera');

                $cont = 0;
                while ($cont < count($id_carrera)) {
                    $pasantia_carrera = new PasantiaCarrera();
                    $pasantia_carrera->id_pasantia = $pasantia->id;
                    $pasantia_carrera->id_carrera = $id_carrera[$cont];
                    $pasantia_carrera->save();
                    $cont = $cont+1;
                }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }

        return Redirect::to('ofertas/pasantia');
    }
    
    public function destroy($id)
    {
   		$pasantia = Pasantia::findOrFail($id);
   		$pasantia->estado = 'No disponible';
   		$pasantia->update();
   		return Redirect::to('ofertas/pasantia');
    }
}
