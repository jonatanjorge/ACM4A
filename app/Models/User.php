<?php

namespace App\Models;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Artesaos\Defender\Traits\HasDefender;

class User extends Authenticatable
{
    use Notifiable;
    use HasDefender;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido', 'email', 'password','telefono','sexo_id'
    ];

    protected $appends = ["full_name"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','id'
    ];

    public function carrera(){
//        return $this->hasOne(Carrera::class,'coordinador','id');
        return $this->hasOne(Carrera::class,'coordinador');
    }

    public function getFullNameAttribute(){
        return ucfirst($this->attributes["nombre"]) . " " . ucfirst($this->attributes["apellido"]);
    }
}
