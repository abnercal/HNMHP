<?php

Route::get('/', function () {
    return view('layouts.index');
 });


// se agrega todas las rutas del bienechor, donaciones entre otros
Route::group(['prefix'=>'bienechor'], function(){

	Route::get('add', function () {
    	return view('bienechor.index');
	});

});

// se agrega todas las rutas del paciente, examen medico, historial entre otros
Route::group(['prefix'=>'paciente'], function(){

	Route::get('add', function () {
    	return view('');
	});
});

// se agrega todas las rutas del medicamento, proveedor entre otros
Route::group(['prefix'=>'Medicamento'], function(){

	Route::get('add', function () {
    	return view('');
	});
});

// se agrega toda las rutas del empleado
Route::group(['prefix'=>'Empleado'], function(){

	Route::get('add', function () {
    	return view('');
	});
});

