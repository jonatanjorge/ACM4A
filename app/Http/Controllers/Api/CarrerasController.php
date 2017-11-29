<?php

namespace App\Http\Controllers\Api;

use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarrerasController extends Controller
{

    protected $carreras;

    public function __construct(Carrera $carrera)
    {
        $this->carreras = $carrera;
    }

    public function listarCarreras(){
        $carreras = $this->carreras->with('comisiones','coord')->get();

        return response()->json($carreras,200);
    }


}
