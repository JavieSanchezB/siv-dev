<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', ['as'=>'inicio', 'uses' => 'InicioController@getInicio']);
    Route::get('logout', 'AuthController@getLogout');


    Route::resource('ventas','VentasController');
    Route::resource('dms','DMSController');
    Route::resource('cliente','ClienteController');
   // Route::get('cliente','ClienteController@getFiltrar')->name('cliente.filtar');;
    Route::resource('vendedor','VendedorController');
    Route::resource('supervisor','SupervisorController');
    Route::resource('producto','ProductoController');
    Route::resource('ruta','RutaController');
	Route::get('asignarruta', 'RutaController@asignarruta')->name('ruta.asignarruta');
	Route::post('asignarruta', 'RutaController@asignarruta')->name('ruta.asignarruta');
	
        Route::resource('circuito','CircuitoController');
		//Route::get('circuito', 'CircuitoController@editar')->name('circuito.editar');
	    //Route::post('circuito', 'CircuitoController@editar')->name('circuito.editar');
		//Route::get('circuito', 'CircuitoController@create')->name('circuito.create');
	    //Route::post('circuito', 'CircuitoController@create')->name('circuito.create');
		//Route::get('circuito', 'CircuitoController@index')->name('circuito.index');
	    //Route::post('circuito', 'CircuitoController@index')->name('circuito.index');
		//Route::get('circuito', 'CircuitoController@store')->name('circuito.store');
	    //Route::post('circuito', 'CircuitoController@store')->name('circuito.store');
		Route::get('actulizar', 'CircuitoController@actualizar')->name('actualizar');
	    Route::post('actualizar', 'CircuitoController@actualizar')->name('actualizar');
		//Route::post('circuito/{id}', ['as' => 'actualizar','uses' => 'CircuitoController@actualizar'])->name('actualizar');
		
		Route::get('actualizarruta', 'RutaController@actualizarruta')->name('actualizarruta');
	    Route::post('actualizarruta', 'RutaController@actualizarruta')->name('actualizarruta');
		
		
	    Route::get('actualizarvendedor', 'VendedorController@actualizar')->name('actualizarvendedor');
	    Route::post('actualizarvendedor', 'VendedorController@actualizar')->name('actualizarvendedor');
		
		Route::get('actualizarsupervisor', 'SupervisorController@actualizar')->name('actualizarsupevisor');
	    Route::post('actualizarsupervisor', 'SupervisorController@actualizar')->name('actualizarsupervisor');

    Route::resource('logger','LogController');


});


Route::group(['middleware' => 'guest'], function () {

    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');

});

Route::get('prueba', function () {
    $venta = \App\Venta::findOrFail(4);

  //  dd($venta->users()->nombre);
});