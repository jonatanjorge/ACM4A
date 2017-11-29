<?php

Route::group(["prefix" => "materias","middleware" => "needsRole:alumno|profesor"],function(){
    //index
    Route::get("/",[
        "as" => "materias.index",
        "uses" => "MateriasController@index"
    ]);

    //vista del formulario de alta
    Route::get("/create",[
        "as" => "materias.create",
        "uses" => "MateriasController@create"
    ]);

    //action del formulario de alta
    Route::post("/store",[
        "as" => "materias.store",
        "uses" => "MateriasController@store"
    ]);

    //vista del formulario de edición
    Route::get("/edit/{id}",[
        "as" => "materias.edit",
        "uses" => "MateriasController@edit"
    ]);

    Route::delete("/destroy/{id}",[
        "as" => "materias.destroy",
        "uses" => "MateriasController@destroy"
    ]);

    //action del formulario de edición
    Route::put("/update/{id}",[
        "as" => "materias.update",
        "uses" => "MateriasController@update"
    ]);
});