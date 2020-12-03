<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePrestamo;
use App\Prestamo;
use App\User;

class PrestamoApiController extends Controller
{

    public function index(Request $request)
    {


    	$user = $request->user();
    	$prestamos = $user->asPrestamos;

    	// result de api request con index correcto
    	return response()->json(
            $prestamos
        );
    }

    public function store(StorePrestamo $request)
    {

		$user = $request->user();
		$id = $user->id;
		$name = $user->name;
	    $surname = $user->surname;
	    $cedula = $user->cedula;
	    $email = $user->email;

	    	//Recoger los datos del formulario
	    $ciudad = $request->input('ciudad');
	    $bloque = $request->input('bloque');
	    $direccion = $request->input('direccion');
	    $salon = $request->input('salon');
	    $programa = $request->input('programa');
	    $celular = $request->input('celular');
	    //$estado = $request->input('estado');
	    $referencia = '';
	    $cantidad = 0;
	    $descripcion = $request->input('descripcion');


	    //Asignar nuevos valores al objeto del prestamo
	    $prestamo = new Prestamo();
	    $prestamo->user_id = $id;
	    $prestamo->name_user = $name;
	    $prestamo->surname_user = $surname;
	    $prestamo->cedula_user = $cedula;
	    $prestamo->ciudad = $ciudad;
	    $prestamo->bloque = $bloque;
	    $prestamo->direccion = $direccion;
	    $prestamo->salon = $salon;
	    $prestamo->estado = 'Pendiente';
	    $prestamo->programa = $programa;
	    $prestamo->celular = $celular;
	    $prestamo->referencia = $referencia;
	    $prestamo->cantidad = $cantidad;
	    $prestamo->descripcion = $descripcion;
	    $prestamo->editado_por = $email;


	    $prestamo->save();

	    if ($prestamo) {
			$success = true;
	    } else {
	    	$success = false;
	    }

	    //$success = $prestamo;

	    return compact('success');
	    }


}
