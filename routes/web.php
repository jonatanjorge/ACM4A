<?php
Auth::routes();

Route::group(["middleware" => "auth"],function(){
    Route::get('/', function () {
        return view('index');
    });


    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']
    );

    require_once( __DIR__ . '/carreras/routesCarreras.php');
    require_once(__DIR__ . '/materias/routesmaterias.php');
    require_once(__DIR__ . '/comisiones/routescomisiones.php');

    require_once(__DIR__ . '/talleres/routesTalleres.php');

    require_once(__DIR__ . '/permisos/routesPermisos.php');
    require_once(__DIR__ . '/roles/routesRoles.php');


});


Route::get('/home', 'HomeController@index');
