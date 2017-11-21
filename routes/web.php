<?php


Route::get('/', function () {
    return view('index');
});

require_once( __DIR__ . '/carreras/routesCarreras.php');
require_once( __DIR__ . '/comisiones/routesComisiones.php');


//localhost/laravel/carreras/detalle -> get
//carrerasController -> getDetalle