<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_prestamo extends Model
{
  protected $table = 'lineas_prestamos';
    //Relacion 
  public function prestamos(){
    return $this->belongsTo('App\prestamos');
  }
 
  //Realcion 
  public function users(){
    return $this->belongsTo('App\User', 'user_id');
  }
}
