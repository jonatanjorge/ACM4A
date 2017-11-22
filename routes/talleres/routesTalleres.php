<?php

Route::group(["prefix" => "talleres","middleware" => "auth"],function(){
    //index
    Route::get("/",[
        "as" => "talleres.index",
        "uses" => "TalleresController@index"
    ]);

    //vista del formulario de alta
    Route::get("/create",[
        "as" => "talleres.create",
        "uses" => "TalleresController@create"
    ]);

    //action del formulario de alta
    Route::post("/store",[
        "as" => "talleres.store",
        "uses" => "TalleresController@store"
    ]);

    //vista del formulario de edición
    Route::get("/edit/{id}",[
        "as" => "talleres.edit",
        "uses" => "TalleresController@edit"
    ]);

    Route::delete("/destroy/{id}",[
        "as" => "talleres.destroy",
        "uses" => "TalleresController@destroy"
    ]);

    //action del formulario de edición
    Route::put("/update/{id}",[
        "as" => "talleres.update",
        "uses" => "TalleresController@update"
    ]);
});