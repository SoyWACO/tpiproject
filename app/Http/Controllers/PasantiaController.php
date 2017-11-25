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
    	//
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $id_empresa = Auth::user()->id;
            $query = trim($request->get('searchText'));
            $pasantias = DB::table('pasantias as p')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->join('carrera_pasantia as pc', 'p.id', '=', 'pc.pasantia_id')
                ->select('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa')
                ->where('p.nombre', 'like', '%'.$query.'%')
    			->where('p.user_id', '=', $id_empresa)
    			->orderBy('p.id', 'desc')
                ->groupBy('p.id', 'p.user_id', 'p.nombre', 'p.descripcion', 'p.created_at', 'u.empresa')
    			->paginate(10);
    		return view('ofertas.pasantia.index', ["pasantias"=>$pasantias, "searchText"=>$query]);
    	}
    }
    public function create()
    {
        $id_empresa = Auth::user()->id;
        $carreras = DB::table('carreras as car')
            ->orderBy('nombre', 'asc')
            ->lists('car.nombre', 'car.id');
        return view('ofertas.pasantia.create', ["empresa"=>$id_empresa, "carreras"=>$carreras]);
    }
    public function store(PasantiaFormRequest $request)
    {
    	$pasantia = new Pasantia($request->all());
        $pasantia->save();
        
        $pasantia->carreras()->sync($request->carrera_id);

    	flash('Se ha creado la pasantia '.$pasantia->nombre.' correctamente.')->success()->important();

        return Redirect::to('ofertas/pasantia');
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
        return view('ofertas.pasantia.show', ["pasantia"=>$pasantia, "carreras"=>$carreras]);
    }
    
    public function edit($id)
    {
    	$tcarreras = DB::table('carreras as car')
                ->orderBy('nombre', 'asc')
                ->lists('car.nombre', 'car.id');
        $carreras = DB::table('carrera_pasantia as pc')
                ->join('carreras as c', 'pc.carrera_id', '=', 'c.id')
                ->where('pc.pasantia_id', '=', $id)
                ->lists('c.id');
        $pasantia = Pasantia::findOrFail($id);

        if ($pasantia->user_id == Auth::user()->id) {
            return view('ofertas.pasantia.edit', ["pasantia"=>$pasantia, "carreras"=>$carreras, "tcarreras"=>$tcarreras]);
        } else {
            return Redirect::to('ofertas/pasantia');
        }
    }
    
    public function update(PasantiaFormRequest $request, $id)
    {
        $pasantia = Pasantia::find($id);
        $pasantia->fill($request->all());
        $pasantia->save();

        $pasantia->carreras()->sync($request->carrera_id);    	

        flash('Se ha editado la pasantia '.$pasantia->nombre.' correctamente.')->success()->important();

        return Redirect::to('ofertas/pasantia');
    }
    
    public function destroy($id)
    {
   		$pasantia = DB::table('pasantias')->where('id', '=', $id)->delete();
        flash('Se ha eliminado la pasantia correctamente.')->error()->important();
        return Redirect::to('ofertas/pasantia');
    }
}
