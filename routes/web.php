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
    return view('welcome');
});
/*
Route::get('/index/{id?}', function ($id = null) {
    return "Hola mundo! $id";
});
*/

//Route::resource("/carreras","CarrerasController");


/*
*/
Route::get("/carreras/{id}",function($id){

    $carreras = \App\Models\Carrera::all();

    if($carreras)
//        return view("carreras.index",["carreras" => $carreras]);
//        return view("carreras.index")->with("carreras",$carreras);
        return view("carreras.index",compact('carreras'));







});

Route::get("/detalle",function(){
    return view("carreras/detalle");
});

Route::get("/talleres",function(){
    $talleres = \App\Models\Taller::all();

    return view("talleres/index", compact("talleres"));
});


//localhost/laravel/carreras/detalle -> get
//carrerasController -> getDetalle