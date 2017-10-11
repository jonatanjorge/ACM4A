<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CarrerasController extends Controller
{
    protected $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    public function index(){
        $carreras = Carrera::all();

        if($carreras)
//        return view("carreras.index",["carreras" => $carreras]);
//        return view("carreras.index")->with("carreras",$carreras);
            return view("carreras.index",compact('carreras'));
    }

    public function detalle($id){
        //dd($this->route->getParameter("id"));
        $carrera = Carrera::find($id);

        return view("carreras/detalle",compact("carrera"));
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
