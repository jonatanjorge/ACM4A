<?php

Route::group(["middleware" => "auth"],function(){
    Route::get('/', function () {
        return view('index');
    });
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']
    );
    require_once( __DIR__ . '/carreras/routesCarreras.php');
    require_once(__DIR__ . '/materias/routesmaterias.php');
});


//localhost/laravel/carreras/detalle -> get
//carrerasController -> getDetalle
Auth::routes();

Route::get('/home', 'HomeController@index');
