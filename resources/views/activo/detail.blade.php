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

            {{ 'Activo # '.$activo->id }}
            <span class="ciudad">
              {{' | '.$activo->nombre }}
            </span>
            </a>

            <div class="activo" >
            {!! QrCode::size(70)->generate($activo->serial); !!}
            </div>


          </div>
        </div>

        <div class="card-body body-prestamo">
          {{'Numero: '.$activo->id }} <br>
          {{'Categoria: '.$activo->categoria_id }} <br>
          {{'Nombre: '.$activo->nombre }} <br>
          {{'Placa: '.$activo->placa }} <br>
          {{'Modelo: '.$activo->modelo }} <br>
          {{'Serial: '.$activo->serial }} <br>
          {{'Descripcion: '.$activo->descripcion }} <br>
          {{'Creado por: '.$activo->user_name.' | '.$activo->created_at }} <br>

        </div>
      </div>

      <a href="{{ route('home') }}" class="btn btn-light btn- activo">Regresar</a>

      @if(Auth::user()->role == 'admin')
      <div class="actions">
        <a href="{{ route('activo.edit', ['id' => $activo->id ]) }}" class="btn  btn-primary">Actualizar</a>
        <!-- <a href="{{ route('activo.delete', ['id' => $activo->id]) }}" class="btn btn-sm btn-danger activoborrar">Eliminar</a> -->


      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger activoborrar " data-toggle="modal" data-target="#exampleModal">
        Eliminar
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirma la eliminacion del activo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Esta acción eliminará definitivamente el activo y no se podrá recuperar después. ¿Estás seguro de que deseas continuar?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <a href="{{ route('activo.delete', ['id' => $activo->id]) }}" class="btn btn-danger">Eliminar</a>
            </div>
          </div>
        </div>
      </div>

      </div>
      @endif

    </div>
  </div>
  @endsection

