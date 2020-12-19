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

  protected $fillable = [
        'ciudad', 'bloque', 'direccion', 'salon', 'programa'
    ];

  protected $hidden = [
        'id', 'created_at', 'updated_at', 'estado'
    ];

  //Relacion uno a mucho
  public function activos(){
    return $this->hasMany('App\Activo');
  }

  //Realcion
  public function users(){
    return $this->belongsTo('App\User', 'user_id');
  }

}
