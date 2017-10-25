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
         return view("acm4a.carreras.index",compact('carreras'));
//        return view("carreras.index",["carreras" => $carreras]);
//        return view("carreras.index")->with("carreras",$carreras);

    }

    public function detalle($id){
        //dd($this->route->getParameter("id"));
        $carrera = Carrera::find($id);

        return view("carreras/detalle",compact("carrera"));
    }


    public function show($id){

    }

    public function create(){
        //traer los coordinadores
        $coordinadores = User::all();

        return view("acm4a.carreras.create",compact('coordinadores'));
    }

    public function store(Request $request){

        $rules = [
            "nombre" => "required|string",
            "alias" => "required|string|between:2,4",
            "coordinador" => "required|exists:users,id"
        ];
/*
        $messages = [
            "required" => "El campo :attribute es obligatorio",
            "string" => "El campo :attribute debe ser una cadena de texto",
            "between" => "El campo :attribute tiene que tener mas de :min y menos de :max caracteres",
            "coordinador.exists" => "El campo coordinador debe ser un coordinador válido"
        ];
*/

        //acuerdense que los mensajes van como 3° parámetro
        $this->validate($request,$rules);


        $datos = $request->all();


        //create a partir de un modelo Carrera
        /*
        $carrera = new Carrera();
        $carrera->nombre = $datos['nombre'];
        $carrera->alias = $datos['alias'];
        $carrera->coordinador = $datos['coordinador'];

        $carrera->save();
        */

        $carrera = Carrera::create($datos);

        // si se crea la carrera lo mando al listado
        // con un mensajito de que se creo correctamente.


        if($carrera):
            return redirect()->route('carreras.index')->with('success',"La carrera se creo correctamente");
        else:
            return redirect()->back()->withErrors();
        endif;

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){
        $carrera = Carrera::find($id);

        if($carrera):
            if($carrera->destroy($id)):
                return redirect()->route("carreras.index")->with("success","Se eliminó correctamente la carrera $carrera->nombre");
            else:
                return redirect()->back()->withErrors("No se pudo eliminar la carrera $carrera->nombre");
            endif;

        else:
            return redirect()->back()->withErrors("No se encontró la carrera a eliminar");
        endif;
    }
}
