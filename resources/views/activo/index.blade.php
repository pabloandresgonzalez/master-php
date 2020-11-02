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

      <h1>Activos</h1>
      <hr>
      <div class="row " style="display: flow-root;" >
        <nav class="navbar navbar-light bg-light float-right" >
          <form class="form-inline">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </nav>
      </div>

      @foreach($activos as $activo)  

      <div class="card pub-prestamo">

        <div class="card-header">
          <div class="prestamo" >
            <a href="{{route('activo.detail', ['id' =>$activo->id]) }}" />
            {{ 'Activo # '.$activo->id }}          
            <span class="ciudad">              
              {{' | '.$activo->nombre}}
            </span>
            </a>
            <!-- Carga el qr 
            <div class="activo" >
              {!! QrCode::size(40)->generate($activo->serial); !!}
            </div>
            -->
          </div>
        </div>

        <div class="card-body body-prestamo">  
          {{'Nombre: '.$activo->nombre }} <br>
          {{'Placa: '.$activo->placa }} <br>
          {{'Modelo: '.$activo->modelo }} <br>
          {{'Serial: '.$activo->serial }} <br>
          {{'Descripcion: '.$activo->descripcion }} <br>
        </div>

      </div>
      @endforeach

      <!-- Paginacion -->
      <div class="clearfix"></div>
      {{$activos->links()}}
      </div>

    
  </div>
  @endsection

