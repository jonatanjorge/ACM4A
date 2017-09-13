<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{

    protected $table = "carreras";

    protected $fillable = ["nombre","coordinador"];

    protected $primaryKey = "id";

    //public $timestamps = false;

    //protected $guarded = ["id","created_at","updated_at"];
}
