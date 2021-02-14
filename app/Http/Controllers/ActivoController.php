<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Activo;


class ActivoController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function create() {
    return view('activo.create');
  }

   public function index(Request $request) {

      $nombre = $request->get('buscarpor');

      $activos = Activo::where('nombre', 'LIKE', "%$nombre%")
                        ->orwhere('categoria_id', 'LIKE', "%$nombre%")
                        ->orwhere('descripcion', 'LIKE', "%$nombre%")
                        ->orwhere('user_name', 'LIKE', "%$nombre%")
                        ->orderBy('id', 'desc')
                        ->paginate(5);

    return view('activo.index', [
        'activos' => $activos
    ]);


  }

  public function save(Request $request) {
    //Conseguir usuario identificado
    $user = \Auth::user();
    $id = $user->id;
    $name = $user->name;
    $surname = $user->surname;
    $cedula = $user->cedula;

    //Validacion del formulario
    $validate = $this->validate($request, [
        'categoria' => 'required',
        'nombre' => 'required|string|max:100',
        'placa' => 'required|string|max:100',
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:100',
        'serial' => 'required|string|max:100',
        'descripcion' => 'required|string|max:255'
    ]);

    //Recoger los datos del formulario
    $categoria = $request->input('categoria');
    $nombre = $request->input('nombre');
    $placa = $request->input('placa');
    $marca = $request->input('marca');
    $modelo = $request->input('modelo');
    $serial = $request->input('serial');
    $descripcion = $request->input('descripcion');

    //Asignar nuevos valores al objeto del activo
    $activo = new Activo();
    $activo->user_id = $id;
    $activo->user_name = $name;
    $activo->categoria_id = $categoria;
    $activo->nombre = $nombre;
    $activo->placa = $placa;
    $activo->placa = $placa;
    $activo->marca = $marca;
    $activo->modelo = $modelo;
    $activo->serial = $serial;
    $activo->descripcion = $descripcion;

    //Subir la imagen
    $image_path = $request->file('image_path');
    if ($image_path) {
      //Poner nombre unico
      $image_path_name = time() . $image_path->getClientOriginalName();

      //Guardarla en la carpeta storage (storage/app/activos)
      Storage::disk('activos')->put($image_path_name, File::get($image_path));

      //Seteo el nombre de la imagen en el objeto
      $activo->image = $image_path_name;
    }

    $activo->save();

    return redirect()->route('activos')->with([
                'message' => 'Activo creado correctamente!!'
    ]);
  }

  public function update(Request $request) {
    //Conseguir usuario identificado
    //$activo = \Activo::activo();
    //$id = $activo->id;

    //Validacion del formulario
    $validate = $this->validate($request, [
        'categoria' => 'required',
        'nombre' => 'required|string|max:100',
        'placa' => 'required|string|max:100',
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:100',
        'serial' => 'required|string|max:100',
        'descripcion' => 'required|string|max:255'
    ]);

    //Recoger los datos del formulario
    $activo_id = $request->input('activo_id');
    $categoria = $request->input('categoria');
    $nombre = $request->input('nombre');
    $placa = $request->input('placa');
    $marca = $request->input('marca');
    $modelo = $request->input('modelo');
    $serial = $request->input('serial');
    $descripcion = $request->input('descripcion');


    //Asignar nuevos valores al objeto del activo
    //Conseguir el bojeto prestamo
    $activo = Activo::find($activo_id);
    $activo->categoria_id = $categoria;
    $activo->nombre = $nombre;
    $activo->placa = $placa;
    $activo->placa = $placa;
    $activo->marca = $marca;
    $activo->modelo = $modelo;
    $activo->serial = $serial;
    $activo->descripcion = $descripcion;


    //Subir la imagen
    $image_path = $request->file('image_path');
    if ($image_path) {
      //Poner nombre unico
      $image_path_name = time() . $image_path->getClientOriginalName();

      //Guardarla en la carpeta storage (storage/app/activos)
      Storage::disk('activos')->put($image_path_name, File::get($image_path));

      //Seteo el nombre de la imagen en el objeto
      $activo->image = $image_path_name;
    }

    $activo->save();

    return redirect()->route('activos')
                     ->with(['message' => 'Activo editado correctamente!!']);

  }

  public function edit($id) {
    $user = \Auth::user();
    $activo = Activo::find($id);

    if ($user->role == 'admin') {
      return view('activo.edit', [
          'activo' => $activo
      ]);
    } else {
      return redirect()->route('activos');
    }
  }

  public function detail($id) {

    $activo = Activo::find($id);

    return view('activo.detail', [
        'activo' => $activo
    ]);
  }

  public function delete($id){
    $user = \Auth::user();
    $activo = Activo::find($id);

    if($user->role == 'admin'){

      $activo->delete();

    }else {
      $message = array('message' => 'Algo salio mal el activo no se eliminado');
    }

    return redirect()->route('activos')->with([
                  'message' => 'Activo eliminado correctamente!!'
    ]);

  }


}
