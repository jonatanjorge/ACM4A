<?php

Route::group(["prefix" => "roles"],function(){
    //index
    Route::get("/",[
        "as" => "roles.index",
        "uses" => "RolesController@index"
    ]);

    //vista del formulario de alta
    Route::get("/create",[
        "as" => "roles.create",
        "uses" => "RolesController@create"
    ]);

    //action del formulario de alta
    Route::post("/store",[
        "as" => "roles.store",
        "uses" => "RolesController@store"
    ]);

    //vista del formulario de edición
    Route::get("/edit/{id}",[
        "as" => "roles.edit",
        "uses" => "RolesController@edit"
    ]);

    Route::delete("/destroy/{id}",[
        "as" => "roles.destroy",
        "uses" => "RolesController@destroy"
    ]);

    //action del formulario de edición
    Route::put("/update/{id}",[
        "as" => "roles.update",
        "uses" => "RolesController@update"
    ]);
});