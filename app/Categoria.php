<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
  
  //Relacion
  public function activos(){
    return $this->hasMany('App\activos');
  }
}
