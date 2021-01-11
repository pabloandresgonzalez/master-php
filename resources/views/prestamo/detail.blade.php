@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
      @endif


      <div class="card pub-prestamo">
        <div class="card-header">

          <div class="prestamo" >

            {{ 'Prestamo # '.$prestamo->id }}
            <span class="ciudad">
              {{' / '.\FormatTime::LongTimeFilter($prestamo->created_at) }}
            </span>
            </a>

          </div>
        </div>


        <div class="card-body body-prestamo">
          {{'Usuario: '.$prestamo->name_user. ' ' .$prestamo->surname_user }}<br>
          @if(Auth::user()->role == 'admin' || Auth::user()->role == 'auxti' || Auth::user()->role == 'auxactivos')
          {{'Identificacion: '.$prestamo->cedula_user }} <br>
          @endif
          {{'Movil: '.$prestamo->celular }} <br>
          {{'Feha creacion: '.$prestamo->created_at }} <br>
          {{'Ciudad:  '.$prestamo->ciudad}} <br>
          {{'Lugar / Bloque: '.$prestamo->bloque }} <br>
          {{'Direccion: '.$prestamo->direccion }} <br>
          {{'Salon / Oficina: '.$prestamo->salon }} <br>
          {{'Cargo / Programa: '.$prestamo->programa }} <br>
          {{'Actualizado: '.$prestamo->updated_at }} <br>
          <strong>Estado:</strong>
            @if($prestamo->estado == 'En tramite' || $prestamo->estado == 'En curso' )
              <span class="badge badge-warning">{{ $prestamo->estado }}</span>
            @else
              <span class="badge badge-success">{{ $prestamo->estado }}</span>
            @endif
            <br>
          {{'Observación: '.$prestamo->descripcion }} <br>
          @if(Auth::user()->role == 'admin' || Auth::user()->role == 'auxti' || Auth::user()->role == 'auxactivos')
          {{'Activo: '.$prestamo->nombre_activo }} <br>
          {{'Serial: '.$prestamo->serial }} <br>
          {{'Placa: '.$prestamo->placa }} <br>
          {{'Referencia: '.$prestamo->referencia }} <br>
          {{'Salida por: '.$prestamo->salida_por }} <br>
          @endif
        </div>
      </div>


      @if(Auth::user()->role == 'admin' || Auth::user()->role == 'auxti' || Auth::user()->role == 'auxactivos')
      <div class="actions">
        @if($prestamo->estado == 'En tramite' || $prestamo->estado == 'En curso' )
         <a href="{{ route('prestamo.edit', ['id' => $prestamo->id ]) }}" class="btn btn-primary"
          data-toggle="tooltip" title="Edita este prestamo">Editar</a>
         @endif
        @endif
        <a href="{{ route('home') }}" class="btn btn-light btn- activo">Regresar</a>
      </div>

    </div>
  </div>
  @endsection