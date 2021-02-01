<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prestamo;
use Cache;

class HomeController extends Controller {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request) {

    //$request->user()->authorizeRoles('user', 'admin');

    $nombre = $request->get('buscarporpre');

    $prestamos = Prestamo::where('id', 'LIKE', "%$nombre%")
                        ->orwhere('name_user', 'LIKE', "%$nombre%")
                        ->orwhere('surname_user', 'LIKE', "%$nombre%")
                        ->orwhere('estado', 'LIKE', "%$nombre%")
                        ->orwhere('programa', 'LIKE', "%$nombre%")
                        ->orwhere('nombre_activo', 'LIKE', "%$nombre%")
                        ->orwhere('descripcion', 'LIKE', "%$nombre%")
                        ->orderBy('id', 'desc')
                        ->paginate(5);

     $users = User::orderBy('id', 'desc')->get();


    return view('/home', [
        'prestamos' => $prestamos,
        'users' => $users
    ]);

  }

}
