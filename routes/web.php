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

Route::resource("/carreras","CarrerasController");
/*
Route::get("/carreras",function(){
    return view("carreras/index");
});

Route::get("/detalle",function(){
    return view("carreras/detalle");
});
*/
Route::controller("carreras","CarrerasController");

//localhost/laravel/carreras/detalle -> get
//carrerasController -> getDetalle