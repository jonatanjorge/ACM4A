<?php

namespace App\Http\Controllers;

use Artesaos\Defender\Facades\Defender;
use Artesaos\Defender\Permission;
use Illuminate\Http\Request;

class PermisosController extends Controller
{

    protected $permisos;

    public function __construct(Permission $permisos)
    {
        $this->permisos = $permisos;
    }


    public function index(){
        $permisos = $this->permisos->all();

        return view('acm4a.permisos.index',compact('permisos'));

    }

    public function show($id){

    }

    public function create(){
        $acciones = config('permisos.acciones');

        return view('acm4a.permisos.form',compact("acciones"));
    }

    public function store(Request $request){
        $nombre = str_replace(" ",".",$request->readable_name);

        $name = config('permisos.acciones')[$request->accion] . "." . $nombre;
        $readableName = config('permisos.acciones')[$request->accion] . " " . $request->readable_name;

        // no llamamos a la clase permisos sino a la clase Defender
        Defender::createPermission($name, $readableName);

        return redirect()->route("permisos.index");
    }

    public function edit($id){
        $permiso = $this->permisos->find($id);
        $acciones = config('permisos.acciones');

        return view('acm4a.permisos.form',compact("acciones","permiso"));
    }

    public function update($id,Request $request){

    }


    public function destroy($id){
        $this->permisos->destroy($id);

        return redirect()->route("permisos.index");
    }


}
