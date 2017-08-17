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

Route::get('/', function () {
    return view('layouts.index');
 });


// se agrega todas las rutas del bienechor, donaciones entre otros
Route::group(['prefix'=>'bienhechor'], function(){
	Route::get('index','CBienhechor@index');
	Route::post('add','CBienhechor@nuevobienhechor');

});

// se agrega todas las rutas del paciente, examen medico, historial entre otros
Route::group(['prefix'=>'paciente'], function(){

	Route::get('add', function () {
    	return view('');
	});
});

// se agrega todas las rutas del medicamento, proveedor entre otros
Route::group(['prefix'=>'medicamento'], function(){

	Route::get('add', function () {
    	return view('');
	});
});

// se agrega toda las rutas del empleado
Route::group(['prefix'=>'empleado'], function(){
	Route::get('index','EmpleadoController1@index');
	Route::get('add','EmpleadoController1@add');
	Route::post('store','EmpleadoController1@store');
	Route::post('update','EmpleadoController1@edit');
	Route::post('delete','EmpleadoController1@modal');
});


Route::group(['prefix'=>'seguridad'], function(){
	Route::get('index','UController@index');
	Route::get('add','UController@add');
	Route::post('store','UController@store');
});







