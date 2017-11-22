<?php

Route::group(["prefix" => "comisiones"],function(){

    //index
    Route::get("/",[
        "as" => "comisiones.index",
        "uses" => "ComisionesController@index"
    ]);

    //vista del formulario de alta
    Route::get("/create",[
        "as" => "comisiones.create",
        "uses" => "ComisionesController@create"
    ]);

    //action del formulario de alta
    Route::post("/store",[
        "as" => "comisiones.store",
        "uses" => "ComisionesController@store"
    ]);

    //vista del formulario de edición
    Route::get("/edit/{id}",[
        "as" => "comisiones.edit",
        "uses" => "ComisionesController@edit"
    ]);

    //action del formulario de edición
    Route::put("/update/{id}",[
        "as" => "comisiones.update",
        "uses" => "ComisionesController@update"
    ]);

    Route::delete("/destroy/{id}",[
        "as" => "comisiones.destroy",
        "uses" => "ComisionesController@destroy"
    ]);


});