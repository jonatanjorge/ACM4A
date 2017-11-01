<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Entity
{
    protected $table = "materias";

    protected $fillable = ["nombre","comisiones_id"];


}
