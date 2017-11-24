<?php

namespace tpiproject\Http\Controllers;

use Illuminate\Http\Request;

use tpiproject\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpiproject\Http\Requests\UserFormRequest;
use tpiproject\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Response;

class UserController extends Controller
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
            $users = DB::table('users as u')
                ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.empresa', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web', 'u.tipo')
                ->where('u.name', 'like', '%'.$query.'%')
                ->orwhere('u.empresa', 'like', '%'.$query.'%')
                ->orderBy('u.id', 'desc')
                ->groupBy('u.id', 'u.name', 'u.email', 'u.password', 'u.empresa', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web', 'u.tipo')
                ->paginate(10);
            return view('administracion.users.index', ["users"=>$users, "searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view('administracion.users.create');
    }
    
    public function store(UserFormRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return Redirect::to('administracion/users');
    }
    
    public function show($id)
    {
        $user = DB::table('users as u')
                ->select('u.id', 'u.name', 'u.email', 'u.password', 'u.empresa', 'u.ciudad', 'u.direccion', 'u.sector', 'u.telefono', 'u.web', 'u.tipo')
                ->where('u.id', '=', $id)
                ->first();
        return view('administracion.users.show', ["user"=>$user]);
    }
    
    public function edit($id)
    {   
        return view('administracion.users.edit', ["user"=>User::findOrFail($id)]);
    }
    
    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        //$user->password = bcrypt($request->password);
        $user->save();
        
        return Redirect::to('administracion/users');
    }
    
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('administracion/users');
    }
}
