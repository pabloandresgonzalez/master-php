<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Bicicleta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class BiciController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('bicicleta.create');
    }

    public function index(Request $request)
    {

        $nombre = $request->get('buscarpor');

        $bicicletas = Bicicleta::where('user_name', 'LIKE', "%$nombre%")
            ->orwhere('user_surname', 'LIKE', "%$nombre%")
            ->orwhere('modelo', 'LIKE', "%$nombre%")
            ->orwhere('serial', 'LIKE', "%$nombre%")
            ->orwhere('color', 'LIKE', "%$nombre%")
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('bicicleta.index', [
            'bicicletas' => $bicicletas
        ]);
    }


    public function savebici(Request $request)
    {
        //Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        $name = $user->name;
        $surname = $user->surname;
        $cedula = $user->cedula;

        //Validacion del formulario
        $validate = $this->validate($request, [
            //'user_name' => 'required|string|max:100',
            //'user_surname' => 'required|string|max:100',
            'modelo' => 'required|string|max:255',
            'serial' => 'required|string|max:100',
            'tipo' => 'required|string|max:100',
            'color' => 'required|string|max:255'
        ]);

        //Recoger los datos del formulario
        //$user_id = $request->input('user_id');
        //$user_name = $request->input('user_name');
        $user_surname = $request->input('user_surname');
        $modelo = $request->input('modelo');
        $serial = $request->input('serial');
        $tipo = $request->input('tipo');
        $color = $request->input('color');


        //Asignar nuevos valores al objeto del activo
        $bicicleta = new Bicicleta();
        $bicicleta->user_id = $id;
        $bicicleta->user_name = $name;
        $bicicleta->user_surname = $surname;
        $bicicleta->modelo = $modelo;
        $bicicleta->serial = $serial;
        $bicicleta->tipo = $tipo;
        $bicicleta->color = $color;


        //Subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            //Poner nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();

            //Guardarla en la carpeta storage (storage/app/activos)
            Storage::disk('ciclas')->put($image_path_name, File::get($image_path));

            //Seteo el nombre de la imagen en el objeto
            $bicicleta->image = $image_path_name;
        }

        $bicicleta->save();


        return redirect()->route('bicicleta')->with([
            'message' => 'Bicicleta registrada correctamente!!'
        ]);
    }

    public function updatebici(Request $request)
    {

        //Conseguir usuario identificado
        //$user = \Auth::user();
        //$id = $user->id;
        //$name = $user->name;
        //$surname = $user->surname;
        //$cedula = $user->cedula;

        //Validacion del formulario
        $validate = $this->validate($request, [
            'user_name' => 'required|string|max:100',
            'user_surname' => 'required|string|max:100',
            'modelo' => 'required|string|max:255',
            'serial' => 'required|string|max:100',
            'tipo' => 'required|string|max:100',
            'color' => 'required|string|max:255'
        ]);

        //Recoger los datos del formulario
        $id = $request->input('id');
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $user_surname = $request->input('user_surname');
        $modelo = $request->input('modelo');
        $serial = $request->input('serial');
        $tipo = $request->input('tipo');
        $color = $request->input('color');


        //Asignar nuevos valores al objeto del activo
        $bicicleta = Bicicleta::find($id);
        $bicicleta->user_id = $user_id;
        $bicicleta->user_name = $user_name;
        $bicicleta->user_surname = $user_surname;
        $bicicleta->modelo = $modelo;
        $bicicleta->serial = $serial;
        $bicicleta->tipo = $tipo;
        $bicicleta->color = $color;


        //Subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            //Poner nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();

            //Guardarla en la carpeta storage (storage/app/activos)
            Storage::disk('ciclas')->put($image_path_name, File::get($image_path));

            //Seteo el nombre de la imagen en el objeto
            $bicicleta->image = $image_path_name;
        }

        $bicicleta->update();

        return redirect()->route('bicicleta')
            ->with(['message' => 'Bicicleta actualizada correctamente!!']);
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $bicicleta = Bicicleta::find($id);

        if ($user == Auth::user()) {
            return view('bicicleta.edit', [
                'bicicleta' => $bicicleta
            ]);
        } else {
            return redirect()->route('bici.edit');
        }
    }

    public function getImage($filename)
    {

        $file = Storage::disk('ciclas')->get($filename);
        return new Response($file, 200);
    }

    public function delete($id){
    $user = \Auth::user();
    $bicicleta = Bicicleta::find($id);

      $bicicleta->delete();

    return redirect()->route('bicicleta')->with([
                  'message' => 'Bicicleta eliminado correctamente!!'
    ]);

  }
}
