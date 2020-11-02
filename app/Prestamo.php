<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';
  
  //Relacion uno a mucho 
  public function activos(){
    return $this->hasMany('App\Activo');
  } 

  //Realcion 
  public function users(){
    return $this->belongsTo('App\User', 'user_id');
  }
}
