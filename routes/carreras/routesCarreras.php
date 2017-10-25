<?php

Route::group(["prefix" => "carreras"],function(){

    //index
    Route::get("/",[
        "as" => "carreras.index",
        "uses" => "CarrerasController@index"
    ]);

    //vista del formulario de alta
    Route::get("/create",[
        "as" => "carreras.create",
        "uses" => "CarrerasController@create"
    ]);

    //action del formulario de alta
    Route::post("/store",[
        "as" => "carreras.store",
        "uses" => "CarrerasController@store"
    ]);

    //vista del formulario de edición
    Route::get("/edit/{id}",[
        "as" => "carreras.edit",
        "uses" => "CarrerasController@edit"
    ]);

    //action del formulario de edición
    Route::put("/update/{id}",[
        "as" => "carreras.update",
        "uses" => "CarrerasController@update"
    ]);

    Route::delete("/destroy/{id}",[
        "as" => "carreras.destroy",
        "uses" => "CarrerasController@destroy"
    ]);


});