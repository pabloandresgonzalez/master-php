<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Bicicleta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {

    //$request->user()->authorizeRoles('user', 'admin', 'auxti');

    $nombre = $request->get('buscarpor');

    $users = User::where('name', 'LIKE', "%$nombre%")
      ->orwhere('surname', 'LIKE', "%$nombre%")
      ->orwhere('role', 'LIKE', "%$nombre%")
      ->orwhere('email', 'LIKE', "%$nombre%")
      ->orderBy('id', 'desc')
      ->paginate(5);

    return view('user.index', [
      'users' => $users
    ]);
  }

  public function config()
  {
    return view('user.config');
  }

  public function configpass()
  {
    return view('user.configpass');
  }


  public function update(Request $request)
  {
    //Conseguir usuario identificado
    $user = \Auth::user();
    $id = $user->id;

    //Validacion del formulario
    $validate = $this->validate($request, [
      //'role' => 'required|string|max:255',
      'name' => 'required|string|max:255',
      'surname' => 'required|string|max:255',
      'cedula' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $id,
      'celular' => 'required|string|max:12'
    ]);

    //Recoger los datos del formulario
    //$role = $request->input('role');
    $name = $request->input('name');
    $surname = $request->input('surname');
    $cedula = $request->input('cedula');
    $email = $request->input('email');
    $celular = $request->input('celular');


    //Asignar nuevos valores al objeto del usuario
    //$user->role = $role;
    $user->name = $name;
    $user->surname = $surname;
    $user->cedula = $cedula;
    $user->email = $email;
    $user->celular = $celular;

    //Subir la imagen
    $image_path = $request->file('image_path');
    if ($image_path) {
      //Poner nombre unico
      $image_path_name = time() . $image_path->getClientOriginalName();

      //Guardarla en la carpeta storage (storage/app/users)        
      Storage::disk('users')->put($image_path_name, File::get($image_path));

      //Seteo el nombre de la imagen en el objeto
      $user->image = $image_path_name;
    }

    //Ejecutar consulta y actualizar registro de BD
    $user->update();

    return redirect()->route('config')
      ->with(['message' => 'Usuario actualizado correctamente!!']);
  }

  public function getImage($filename)
  {


    $file = Storage::disk('users')->get($filename);
    return new Response($file, 200);
  }

  public function profile($id)
  {
    $user = User::find($id);

    return Response()->view('user.profile', [
      'user' => $user
    ]);
  }

  public function edituser($id)
  {
    //$user = \Auth::user();
    $user = User::find($id);

    return view('user.edit', [
      'user' => $user
    ]);
  }

  public function updaterol(Request $request)
  {
    //Conseguir usuario identificado
    //$user = \Auth::user();
    //$id = $user->id;

    //Validacion del formulario
    $validate = $this->validate($request, [
      //'role' => 'required|string|max:255',
      'name' => 'required|string|max:255',
      'surname' => 'required|string|max:255',
      'cedula' => 'required|string|max:255',
      //'email' => 'required|string|email|max:255',
      'celular' => 'required|max:12'
    ]);

    //Recoger los datos del formulario
    $user_id = $request->input('user_id');
    $role = $request->input('role');
    $name = $request->input('name');
    $surname = $request->input('surname');
    $cedula = $request->input('cedula');
    //$email = $request->input('email');
    $celular = $request->input('celular');


    //Asignar nuevos valores al objeto del usuario
    $user = User::find($user_id);
    $user->role = $role;
    $user->name = $name;
    $user->surname = $surname;
    $user->cedula = $cedula;
    //$user->email = $email;
    $user->celular = $celular;

    //Subir la imagen
    $image_path = $request->file('image_path');
    if ($image_path) {
      //Poner nombre unico
      $image_path_name = time() . $image_path->getClientOriginalName();

      //Guardarla en la carpeta storage (storage/app/users)        
      Storage::disk('users')->put($image_path_name, File::get($image_path));

      //Seteo el nombre de la imagen en el objeto
      $user->image = $image_path_name;
    }

    //Ejecutar consulta y actualizar registro de BD
    $user->update();

    return redirect()->route('user.index')
      ->with(['message' => 'Usuario actualizado correctamente!!']);
  }


}
