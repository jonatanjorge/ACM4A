<?php


Route::get('/', function () {
    return view('index');
});

require_once( __DIR__ . '/carreras/routesCarreras.php');
require_once(__DIR__ . '/materias/routesmaterias.php');
require_once(__DIR__ . '/talleres/routesTalleres.php');

//localhost/laravel/carreras/detalle -> get
//carrerasController -> getDetalle
Auth::routes();

Route::get('/home', 'HomeController@index');
