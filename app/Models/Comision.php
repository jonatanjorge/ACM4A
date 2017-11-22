<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comision extends Entity
{
    protected $table = "comisiones";

    protected $fillable = ["nombre","turno","cuatrimestre","division","carreras_id"];

    public function getInicialTurnoAttribute($param){
        if($this->attributes["turno"] == "mañana")
            $val = "M";
        elseif($this->attributes["turno"] == "tarde")
            $val = "T";
        else
            $val = "N";

        return $val;
    }


    public function setNombreAttribute($turno){
       if($turno == "mañana")
            $t = "M";
        else if($turno == "tarde")
            $t = "T";
        else
            $t = "N";

        $alias = $this->carrera->alias;
        $this->attributes["nombre"] = strtoupper($alias.$t.$this->attributes['cuatrimestre'].$this->attributes['division']);
    }

    public function editNombreAttribute($tur, $cua, $div, $car){
        if($tur == "mañana")
            $t = "M";
        else if($tur == "tarde")
            $t = "T";
        else
            $t = "N";

        $nuevoNombre = strtoupper($this->carrera->find($car)->alias.$t.$cua.$div);

        if($this->attributes["nombre"] != $nuevoNombre){
            $this->attributes["nombre"] = $nuevoNombre;
            $this->attributes["turno"] = $tur;
            $this->attributes["cuatrimestre"] = $cua;
            $this->attributes["division"] = $div;
            $this->attributes["carreras_id"] = $car;
            $this->save();
        }
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class,'carreras_id');
    }



}
