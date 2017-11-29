<?php

namespace App\Http\Controllers;

use App\Http\Functions\ApiFunction;
use App\Http\Requests\StoreCarrerasRequest;
use App\Models\Carrera;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CarrerasController extends Controller
{
    protected $route;

    public function __construct(Route $route)
    {
        // el mas inseguro PARA MI
        // $this->middleware("guest");

        $this->route = $route;
    }

    public function index(Carrera $carrera){
        $carreras = $carrera->withTrashed()->get();

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
        $usuarios = User::all();

        $coordinadores = [];

        foreach($usuarios as $coordinador):
            $coordinadores[$coordinador->id] = $coordinador->fullname;
        endforeach;
        // listar directamente desde la tabla
//        $coordinadores = User::pluck("fullname","id");


        return view("acm4a.carreras.form",compact('coordinadores'));
    }

    public function store(StoreCarrerasRequest $request){

        /*
         * Laravel inyecta en el objeto $request al usuario logueado que hizo esa petición
         *
        $usuario = Auth::user();
        $usuario = $request->user();
        */
/*
        $messages = [
            "required" => "El campo :attribute es obligatorio",
            "string" => "El campo :attribute debe ser una cadena de texto",
            "between" => "El campo :attribute tiene que tener mas de :min y menos de :max caracteres",
            "coordinador.exists" => "El campo coordinador debe ser un coordinador válido"
        ];
*/

        //acuerdense que los mensajes van como 3° parámetro
//        $this->validate($request,$rules);

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
            return redirect()->back()->withErrors()->withInput();
        endif;

    }

    public function edit($id){
        $usuarios = User::all();

        $coordinadores = [];

        foreach($usuarios as $coordinador):
            $coordinadores[$coordinador->id] = $coordinador->fullname;
        endforeach;

        $carrera = Carrera::find($id);

        return view("acm4a.carreras.form",compact('coordinadores','carrera'));
    }

    public function update($id,Request $request){
        $rules = [
            "nombre" => "required|string",
            "alias" => "required|string|between:2,4",
            "coordinador" => "required|exists:users,id"
        ];

        $this->validate($request,$rules);

        // tomar los datos
        $datos = $request->all();

        $carrera = Carrera::find($id);

        if($carrera->update($datos)):
            return redirect()->route('carreras.index')->with("success","Se editó correctamente la carrera ".$carrera->nombre);
        else:
            return redirect()->back()->withErrors()->withInput();
        endif;

    }

    public function restore($id){
        $carrera = Carrera::withTrashed()->find($id);


        if($carrera):
            if($carrera->restore($id)):
                return redirect()->route("carreras.index")->with("success","Se restauró correctamente la carrera $carrera->nombre");
            else:
                return redirect()->back()->withErrors("No se pudo restaurar la carrera $carrera->nombre");
            endif;

        else:
            return redirect()->back()->withErrors("No se encontró la carrera a restaurar");
        endif;

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


    public function getCarrerasApi(ApiFunction $apiFunction){

        $url = env("URL_BASE")."carreras";

        dd($apiFunction->call($url));
    }




}
