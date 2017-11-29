<?php

Route::group(["prefix" => "permisos"],function(){
    //index
    Route::get("/",[
        "as" => "permisos.index",
        "uses" => "PermisosController@index"
    ]);

    //vista del formulario de alta
    Route::get("/create",[
        "as" => "permisos.create",
        "uses" => "PermisosController@create"
    ]);

    //action del formulario de alta
    Route::post("/store",[
        "as" => "permisos.store",
        "uses" => "PermisosController@store"
    ]);

    //vista del formulario de edición
    Route::get("/edit/{id}",[
        "as" => "permisos.edit",
        "uses" => "PermisosController@edit"
    ]);

    Route::delete("/destroy/{id}",[
        "as" => "permisos.destroy",
        "uses" => "PermisosController@destroy"
    ]);

    //action del formulario de edición
    Route::put("/update/{id}",[
        "as" => "permisos.update",
        "uses" => "PermisosController@update"
    ]);
});