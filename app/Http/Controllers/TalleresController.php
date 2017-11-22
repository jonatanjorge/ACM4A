<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTalleresRequest;
use App\Http\Requests\UpdateTalleresRequest;
use App\Models\Taller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TalleresController extends Controller
{
    public function index(){
        $talleres = Taller::all();

        if($talleres)
            return view("acm4a.talleres.index",compact('talleres'));

    }

    public function show($id){

    }

    public function create(User $user){
        //traer los coordinadores
        $usuarios = User::all();

        $coordinadores = [];

        foreach($usuarios as $coordinador):
            $coordinadores[$coordinador->id] = $coordinador->fullname;
        endforeach;

        return view ('acm4a.talleres.form',compact('coordinadores'));
    }

    public function store(CreateTalleresRequest $request){

        $datos = $request->all();

        $taller = Taller::create($datos);

        if($taller){
            return redirect()->route("talleres.index")->with("success","Se creo correctamente el taller");
        }else{
            return redirect()->back()->withErrors()->withInput();

        }

    }

    public function edit($id){

        $usuarios = User::all();
        $coordinadores = [];

        foreach($usuarios as $coordinador):
            $coordinadores[$coordinador->id] = $coordinador->fullname;
        endforeach;

          $taller = Taller::find($id);
          if($taller)
            return view("acm4a.talleres.form", compact('taller','coordinadores'));
          else
              return redirect()->back()->withErrors()->withInput();
        }

    public function update($id, UpdateTalleresRequest $request){

        $datos = $request->all();

        $talleres = Taller::find($id);

        if($talleres->update($datos))
            return redirect()->route('talleres.index')->with('success','se editó correctamente el taller'.$talleres->nombre);
        else
            return redirect()->back()->withErrors()->withInput();
    }

    public function restore($id){


    }

    public function destroy($id){

        $taller = Taller::find($id);

        if($taller):
            if($taller->destroy($id))
                return redirect()->route('talleres.index')->with('success', 'Se eliminó correctamente el taller');
            else
                return redirect()->back()->withErrors('No se pudo eliminar la materia'.$taller->nombre);

        else:
            return redirect()->back()->withErrors('No se encontró taller a eliminar');
        endif;
    }
}
