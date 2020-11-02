<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
    protected $table = 'bicicletas';
  
    //Relacion 
    public function prestamos(){
      return $this->belongsTo('App\prestamos');
    }
   
    //Realcion 
    public function users(){
      return $this->belongsTo('App\User', 'user_id');
    }  
}
