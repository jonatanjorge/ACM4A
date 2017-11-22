<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index(){
        $materias = Materia::all();

        if($materias)
            return view("acm4a.materias.index",compact('materias'));
    }

    public function show($id){

    }

    public function create(){
        return view ('acm4a.materias.form');
    }

    public function store(Request $request){
        //Falta validar
        $datos = $request->all();

        $materia = Materia::create($datos);

        if ($materia)
            return redirect()->route('materias.index')->with('success','La materia se creó correctamente');
        else
            return redirect()->back()->withErrors()->withInput();
    }

    public function edit($id){
        $materia = Materia::find($id);

        if($materia)
            return view('acm4a.materias.form',compact('talleres','materia'));
        else
            return redirect()->back()->withErrors()->withInput();
    }

    public function update($id,Request $request){
        $rules = [
            'nombre' => 'required|string'
        ];

        $this->validate($request, $rules);

        $datos = $request->all();

        $materia = Materia::find($id);

        if($materia->update($datos))
            return redirect()->route('materias.index')->with('success','se editó correctamente la materia'.$materia->nombre);
        else
            return redirect()->back()->withErrors()->withInput();
    }

    public function restore($id){


    }

    public function destroy($id){
        $materia = Materia::find($id);

        if($materia):
            if($materia->destroy($id))
                return redirect()->route('materias.index')->with('success', 'Se eliminó correctamente la materia');
            else
                return redirect()->back()->withErrors('No se pudo eliminar la materia'.$materia->nombre);

        else:
            return redirect()->back()->withErrors('No se encontró la materia a eliminar');
        endif;
    }
}
