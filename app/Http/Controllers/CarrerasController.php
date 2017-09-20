<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrerasController extends Controller
{

    public function index(){
        return view("carreras/index");
    }

    public function detalle(){
        return view("carreras/detalle");
    }


    public function show($id){

    }

    public function create(){

    }

    public function store(){

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){

    }
}
