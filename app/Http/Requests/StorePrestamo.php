<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrestamo extends FormRequest
{

    public function rules()
    {
        return [
            'ciudad' => 'required',
            'bloque' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'salon' => 'required|string|max:255',
            'programa' => 'required|string|max:255',
            //'celular' => 'required|string|max:255',
            //'estado' => 'required|string|max:20'
            //'referencia' => 'required|string|max:100',
            //'cantidad' => 'required',
            'descripcion' => 'required|string|max:255',
        ];
    }

    /*
    public function messages()
    {
        return [
        'message' => 'Solicitud enviada correctamente!!'
        ];
    }
    */
}
