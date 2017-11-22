<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Comision;
use App\Http\Requests\CreateComisionesRequest;
use App\Http\Requests\EditComisionesRequest;


class ComisionesController extends Controller
{
    public function index(){
        $comisiones = Comision::all();

        if($comisiones)
            return view("acm4a.comisiones.index",compact('comisiones'));
    }

    public function detalle(){
        return view("comisiones/detalle");
    }


    public function show($id){

    }

    public function create(){
        $carreras = Carrera::all();
        return view("acm4a.comisiones.create",compact('carreras'));
    }

    public function store(CreateComisionesRequest $request){
        $datos = $request->all();

        $datos["nombre"] = $datos["turno"];
        $comision = Comision::create($datos);

        if($comision):
            return redirect()->route('comisiones.index')->with('success',"La comisión se creó correctamente");
        else:
            return redirect()->back()->withErrors();
        endif;
    }

    public function edit($id){
        $carreras = Carrera::all();
        $comisiones = Comision::all();
        $cid = Comision::find($id);
        return view("acm4a.comisiones.edit",compact('carreras','comisiones','cid'));
    }

    public function update(EditComisionesRequest $request, $id){
        $datos = $request->all();

        $comision = Comision::find($id);
        $viejoNombre = $comision->nombre;

        $comision->editNombreAttribute($datos["turno"],$datos["cuatrimestre"],$datos["division"],$datos["carreras_id"]);

        if($comision):
            if($comision->nombre != $viejoNombre):
                return redirect()->route('comisiones.index')->with('success',"La comisión ".$comision->nombre." se editó correctamente");
            else:
                return redirect()->back()->withErrors("No se realizaron cambios!");
            endif;
        else:
            return redirect()->back()->withErrors();
        endif;
    }

    public function destroy($id){
        $comision = Comision::find($id);

        if($comision):
            if($comision->destroy($id)):
                return redirect()->route("comisiones.index")->with("success","Se eliminó correctamente la comisión $comision->nombre");
            else:
                return redirect()->back()->withErrors("No se pudo eliminar la comisión $comision->nombre");
            endif;
        else:
            return redirect()->back()->withErrors("No se encontró la comisión a eliminar");
        endif;
    }
}
