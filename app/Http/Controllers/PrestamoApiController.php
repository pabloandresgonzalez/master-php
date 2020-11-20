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
    	//$user = response()->json($request->user());
    	//return $user->prestamos;

    	//$user = \Auth::user();
    	$user = $request->user();
    	$prestamos = $user->asPrestamos;
    	return $prestamos;


/*
    	$prestamos = Prestamo::where('user_id', $user->id)->orderBy('id', 'desc')->get([
			"id",
			"user_id",
			"name_user",
			"surname_user",
			"cedula_user",
			"ciudad",
			"bloque",
			"direccion",
			"estado",
			"nombre_activo",
			"serial",
			"placa",
			"salon",
			"programa",
			"celular",
			"referencia",
			"cantidad",
			"salida_por",
			"descripcion",
			"editado_por",
			"created_at",
			"updated_at",
    	]);


<<<<<<< HEAD
        return response($prestamos);
/*
        return response()->json([
            'prestamos' => $prestamos
        ]);
        */
=======
    	return response()->json([
            'prestamos' => $prestamos
        ]);

>>>>>>> ba1d2930e54c2894f9279639992de88e14e81807

    }

    public function store()
    {

    }


}
