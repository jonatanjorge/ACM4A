<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{

    protected $table = "carreras";

    protected $fillable = ["nombre","alias","coordinador"];

    protected $primaryKey = "id";


    //public $timestamps = false;

    //protected $guarded = ["id","created_at","updated_at"];

    public function coord(){
        //tabla users
        return $this->belongsTo(User::class,'coordinador');
    }
    /*
     * 1 carrera -> muchas materias
    public function materias(){
        return $this->hasMany(Materia::class);
    }
    */

    public function comisiones(){
        return $this->hasMany(Comision::class,'carreras_id');
    }


}
