<?php

namespace tpiproject\Http\Controllers;

use Illuminate\Http\Request;

use tpiproject\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use tpiproject\Http\Requests\CarreraFormRequest;
use tpiproject\Carrera;
use DB;

class CarreraController extends Controller
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
            $carreras = DB::table('carreras')
                ->where('nombre', 'like', '%'.$query.'%')
    			->orderBy('nombre', 'asc')
    			->paginate(10);
    		return view('administracion.carreras.index', ["carreras"=>$carreras, "searchText"=>$query]);
    	}
    }
    public function create()
    {
        return view("administracion.carreras.create");
    }
    public function store(CarreraFormRequest $request)
    {
        $carrera = new Carrera;
        $carrera->nombre = $request->get('nombre');
        $carrera->save();
    	return Redirect::to('administracion/carreras');
    }
    public function show($id)
    {
        return view("administracion.carreras.show", ["carrera"=>Carrera::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view('administracion.carreras.edit', ["carrera"=>Carrera::findOrFail($id)]);
    }
    public function update(CarreraFormRequest $request, $id)
    {
    	$carrera = Carrera::findOrFail($id);
        $carrera->nombre = $request->get('nombre');
    	$carrera->update();
    	return Redirect::to('administracion/carreras');
    }
    public function destroy($id)
    {
   		$carrera = Carrera::findOrFail($id);
   		$carrera->delete();
   		return Redirect::to('administracion/carreras');
    }
}
