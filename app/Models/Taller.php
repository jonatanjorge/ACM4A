<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Taller extends Entity
{
    protected $table = "talleres";

    protected $fillable = ["nombre", "profesor_id", "horario", "cantidad_horas", "fecha_inicio"];

    public function carrera()
    {
        return $this->belongsToMany(Carrera::class, "carrera_taller");
    }
    public function profesor()
    {
       // return $this->belongsToMany(User::class, "user");
    }
}
