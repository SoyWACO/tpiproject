<?php

namespace tpiproject\Http\Controllers;

use Illuminate\Http\Request;

use tpiproject\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpiproject\Http\Requests\UsuarioFormRequest;
use tpiproject\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Response;


class UsuarioController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
    	//
    }

    public function edit($id)
    {   
        $user = User::findOrFail($id);

        if ($user->id == Auth::user()->id) {
        	return view('auth.edit', ["user"=>$user]);
        } else {
        	return Redirect::to('/');
        }
    }
    
    public function update(UsuarioFormRequest $request, $id)
    {
        try {
            DB::beginTransaction();
                $user = User::findOrFail($id);
                $user->fill($request->all());
                
                $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            flash('El correo electrónico ya existe, coloque otro.')->warning()->important();
            return Redirect::to('auth/'.$id.'/edit');
        }
        flash('Has editado tu perfil correctamente.')->success()->important();
        return Redirect::to('ofertas/proyecto');
    }
}
