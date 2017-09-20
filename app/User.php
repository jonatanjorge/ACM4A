<?php

namespace App;

use App\Models\Carrera;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido', 'email', 'password','telefono'
    ];

    protected $appends = ["full_name"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carrera(){
//        return $this->hasOne(Carrera::class,'coordinador','id');
        return $this->hasOne(Carrera::class,'coordinador');
    }

    public function getFullNameAttribute(){
        return $this->attributes["nombre"] . " " . $this->attributes["apellido"];
    }
}
