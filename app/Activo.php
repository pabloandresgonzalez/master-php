<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $table = 'activos';
  
  //Relacion 
  public function prestamos(){
    return $this->belongsTo('App\prestamos');
  }
 
  //Realcion 
  public function users(){
    return $this->belongsTo('App\User', 'user_id');
  }  
  
}
