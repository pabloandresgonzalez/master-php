<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';


    protected $fillable = [
          'ciudad', 'bloque', 'direccion', 'salon', 'programa'
      ];

    //para ocultar campos del modelo
     protected $hidden = [
          'created_at', 'updated_at'
      ];

  //Relacion uno a mucho
  public function activos(){
    return $this->hasMany('App\Activo');
  }

  //Relacion
  public function users(){
    return $this->belongsTo('App\User', 'user_id');
  }

  public function user(){
    return$this->belongsTo(User::class);
  }

}
