<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});
/*
Route::get('/index/{id?}', function ($id = null) {
    return "Hola mundo! $id";
});
*/

//Route::resource("/carreras","CarrerasController");


/*
*/
Route::group(["prefix" => "/carreras"], function(){

    Route::get("/",[
        'as' => "carreras.index",
        'uses' => "CarrerasController@index"
    ]);

    Route::get("/{id}",[
        'as' => 'carreras.detalle',
        'uses' => 'CarrerasController@detalle'
    ]);

});

Route::get("/talleres",function(){
    $talleres = \App\Models\Taller::all();

    return view("talleres/index", compact("talleres"));
});


//localhost/laravel/carreras/detalle -> get
//carrerasController -> getDetalle