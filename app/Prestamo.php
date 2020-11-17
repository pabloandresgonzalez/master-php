<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    /* para ocultar campos del modelo
    protected $hidden =[
    	'created_at', 'id'
    ];
    */

  //Relacion uno a mucho
  public function activos(){
    return $this->hasMany('App\Activo');
  }

  //Realcion
  public function users(){
    return $this->belongsTo('App\User', 'user_id');
  }

}
