<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\User;

class PrestamoApiController extends Controller
{
/*
"id,
"user_id,
"name_user,
"surname_user,
"cedula_user,
"ciudad,
"bloque,
"direccion,
"estado,
"nombre_activo,
"serial,
"placa,
"salon,
"programa,
"celular,
"referencia,
"cantidad,
"salida_por,
"descripcion,
"editado_por,
"created_at,
"updated_at,
*/

    public function index(Request $request)
    {


    	$user = $request->user();
    	$prestamos = $user->asPrestamos;

    	// result de api request con index correcto
    	return response()->json(
            $prestamos
        );
    }

    public function store()
    {

    }


}
