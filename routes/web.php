<?php


Route::get('/', function () {
    return view('index');
});

require_once( __DIR__ . '/carreras/routesCarreras.php');


//localhost/laravel/carreras/detalle -> get
//carrerasController -> getDetalle