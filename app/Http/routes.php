<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

	Route::resource('ofertas/proyecto', 'ProyectoController');

	Route::resource('ofertas/pasantia', 'PasantiaController');

	Route::resource('auth', 'UsuarioController');
	
	Route::group(['middleware' => 'admin'], function() {

		Route::resource('administracion/carreras', 'CarreraController');

		Route::resource('administracion/proyecto', 'AdmProyectoController');

		Route::resource('administracion/pasantia', 'AdmPasantiaController');

		Route::resource('administracion/users', 'UserController');
	
	});

});

Route::resource('buscar/proyecto', 'BuscarProyectoController');

Route::resource('buscar/pasantia', 'BuscarPasantiaController');

Route::get('proyectos-carrera/{id}', [
	'uses' => 'BuscarProyectoController@searchCarrera',
	'as' => 'buscar.search.procarrera'
]);

Route::get('pasantias-carrera/{id}', [
	'uses' => 'BuscarPasantiaController@searchCarrera',
	'as' => 'buscar.search.pascarrera'
]);

Route::get('/{slug?}', 'HomeController@index');

Route::get('/administracion/{slug?}', 'HomeController@index');

Route::get('/ofertas/{slug?}', 'HomeController@index');

Route::get('/buscar/{slug?}', 'HomeController@index');