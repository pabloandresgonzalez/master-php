<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePrestamo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Prestamo;
use App\User;


class PrestamoController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function create()
  {
    return view('prestamo.create');
  }

  public function save(StorePrestamo $request)
  {
    //Conseguir usuario identificado
    $user = \Auth::user();
    $id = $user->id;
    $name = $user->name;
    $surname = $user->surname;
    $cedula = $user->cedula;
    $email = $user->email;

    /*
    //Validacion del formulario
    $validate = $this->validate($request, [
        'ciudad' => 'required',
        'bloque' => 'required|string|max:100',
        'direccion' => 'required|string|max:255',
        'salon' => 'required|string|max:255',
        'programa' => 'required|string|max:255',
        'celular' => 'required|string|max:255',
        //'estado' => 'required|string|max:20'
        //'referencia' => 'required|string|max:100',
        //'cantidad' => 'required',
        'descripcion' => 'required|string|max:255',
    ]);
    */

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
    $prestamo->estado = 'En tramite';
    $prestamo->programa = $programa;
    $prestamo->celular = $celular;
    $prestamo->referencia = $referencia;
    $prestamo->cantidad = $cantidad;
    $prestamo->descripcion = $descripcion;
    $prestamo->editado_por = $email;



    $prestamo->save();

    return redirect()->route('home')->with([
                'message' => 'Solicitud enviada correctamente!!'
    ]);
  }

  public function detail($id) {

    $prestamo = Prestamo::find($id);

    return view('prestamo.detail', [
        'prestamo' => $prestamo
    ]);
  }

  public function index() {
    //Conseguir usuario identificado
    $user = \Auth::user();
    //$id = $user->id;
    //$name = $user->name;
    //$image = $user->image;
    //$users = User::orderBy('id', 'desc')->get();
    $prestamos = Prestamo::where('user_id', $user->id)->orderBy('id', 'desc')
            ->paginate(5);

                  return view('prestamo.misprestamos', [
        'prestamos' => $prestamos,
            //'users' => $users
    ]);

  }

  /*
    //Eliminar prestamo
    public function delete($id){
    $user = \Auth::user();
    $prestamo = Prestamo::find($id);

    if($user && $prestamo && $prestamo->user_id == $user->id){

    //Eliminar registro del prestamo
    $prestamo->delete();

    $message = array('message' => 'El prestamo se elimino correctamente.');
    }else{
    $message = array('message' => 'El prestamo no se elimino.');
    }
    return redirect()->route('home')->with($message);
    }
   *
   */

  public function edit($id) {
    $user = \Auth::user();
    $prestamo = Prestamo::find($id);

    return view('prestamo.edit', [
      'prestamo' => $prestamo
  ]);

  }

  public function update(Request $request) {
    //Conseguir usuario identificado
    $user = \Auth::user();
    $id = $user->id;
    $email = $user->email;


    //Validacion del formulario
    $validate = $this->validate($request, [
        //'ciudad' => 'required|string|max:100',
        //'bloque' => 'required|string|max:100',
        //'direccion' => 'required|string|max:255',
        //'salon' => 'required|string|max:255',
        //'programa' => 'required|string|max:255',
        //'celular' => 'required|string|max:255',
        'salida_por' => 'required|string|max:255',
        'estado' => 'required|string|max:20',
        'nombre_activo' => 'required|string|max:255',
        'serial' => 'required|string|max:255',
        'placa' => 'required|string|max:100',
        'referencia' => 'required|string|max:100',
        'cantidad' => 'required',
        'salida_por' => 'required|string|max:255',
        'descripcion' => 'required|string|max:255',
        //'editado_por' => 'required|string|max:255'
        'image_path' => 'image'

    ]);

    //Recibir los datos del formulario
    $prestamo_id = $request->input('prestamo_id');
    //$ciudad = $request->input('ciudad');
    //$bloque = $request->input('bloque');
    //$direccion = $request->input('direccion');
    //$salon = $request->input('salon');
    //$programa = $request->input('programa');
    //$celular = $request->input('celular');
    $estado = $request->input('estado');
    $nombre_activo = $request->input('nombre_activo');
    $serial = $request->input('serial');
    $placa = $request->input('placa');
    $referencia = $request->input('referencia');
    $cantidad = $request->input('cantidad');
    $salida_por = $request->input('salida_por');
    $descripcion = $request->input('descripcion');
    //$editado_por = Rrequest->input('editado_por');



    //Conseguir el bojeto prestamo
    $prestamo = Prestamo::find($prestamo_id);

    $name = $prestamo->name_user;
    $surname = $prestamo->surname_user;
    $cedula = $prestamo->cedula_user;
    //$email = $prestamo->email;

    $prestamo->name_user = $name;
    $prestamo->surname_user = $surname;
    $prestamo->cedula_user = $cedula;
    //$prestamo->ciudad = $ciudad;
    //$prestamo->bloque = $bloque;
    //$prestamo->direccion = $direccion;
    //$prestamo->salon = $salon;
    $prestamo->estado = $estado;
    //$prestamo->programa = $programa;
    //$prestamo->celular = $celular;
    $prestamo->nombre_activo = $nombre_activo;
    $prestamo->serial = $serial;
    $prestamo->placa = $placa;
    $prestamo->referencia = $referencia;
    $prestamo->cantidad = $cantidad;
    $prestamo->salida_por = $salida_por;
    $prestamo->descripcion = $descripcion;
    $prestamo->editado_por = $email;


    //Subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            //Poner nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();

            //Guardarla en la carpeta storage (storage/app/activos)
            Storage::disk('ordenes')->put($image_path_name, File::get($image_path));

            //Seteo el nombre de la imagen en el objeto
            $prestamo->image = $image_path_name;
        }


    //Actualizar registro
    $saved = $prestamo->update();

    if ($saved){

        $prestamo->user->sendFCM("El prestamo # ".$prestamo_id." fue actualizado a estado ".$estado." !");

    }

    return redirect()->route('prestamo.detail', ['id' => $prestamo_id])
                     ->with(['message' => 'Prestamo editado correctamente!!']);

  }

  public function savesalida(Request $request) {
    //Conseguir usuario identificado
    $user = \Auth::user();
    $id = $user->id;
    $name = $user->name;
    $surname = $user->surname;
    $cedula = $user->cedula;

    //Validacion del formulario
    $validate = $this->validate($request, [
        'ciudad' => 'required',
        'bloque' => 'required|string|max:100',
        'direccion' => 'required|string|max:255',
        'salon' => 'required|string|max:255',
        'programa' => 'required|string|max:255',
        'celular' => 'required|string|max:255',
        //'estado' => 'required|string|max:20'
        'salida_por' => 'required|string|max:255',
        'referencia' => 'required|string|max:100',
        //'cantidad' => 'required',
        'descripcion' => 'required|string|max:255',
    ]);

    //Recoger los datos del formulario
    $ciudad = $request->input('ciudad');
    $bloque = $request->input('bloque');
    $direccion = $request->input('direccion');
    $salon = $request->input('salon');
    $programa = $request->input('programa');
    $celular = $request->input('celular');
    //$estado = $request->input('estado');
    $salida_por = $request->input('salida_por');
    $referencia = $request->input('referencia');
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
    $prestamo->estado = 'En tramite';
    $prestamo->programa = $programa;
    $prestamo->celular = $celular;
    $prestamo->salida_por = $salida_por;
    $prestamo->referencia = $referencia;
    $prestamo->cantidad = $cantidad;
    $prestamo->descripcion = $descripcion;


    $prestamo->save();

    return redirect()->route('home')->with([
                'message' => 'Solicitud enviada correctamente!!'
    ]);
  }

  public function createmobiliario() {
    return view('prestamo.mobiliario');
  }

  public function createparqueadero() {
    return view('prestamo.parqueadero');
  }

  public function getImage($filename)
    {

        $file = Storage::disk('ordenes')->get($filename);
        return new Response($file, 200);
    }

  public function orden($id)
    {
        $prestamo = Prestamo::find($id);

        return view('prestamo.orden', [
            'prestamo' => $prestamo
        ]);

    }


}
