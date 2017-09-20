<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    protected $table = "comisiones";

    protected $fillable = ["nombre","turno","cuatrimestre","division","carreras_id"];

    public function getInicialTurnoAttribute(){
        if($this->attributes["turno"] == "mañana")
            $val = "M";
        elseif($this->attributes["turno"] == "tarde")
            $val = "T";
        else
            $val = "N";

        return $val;
    }


    public function setNombreAttributes($value){
        $nombre = $this->attributes["inicial_turno"] . $this->attributes["cuatrimestre"] . $this->attributes["division"];

        $this->attributes["nombre"] = strtoupper($nombre);
    }


    public function carrera(){
        return $this->belongsTo(Carrera::class,'carreras_id');
    }

}
