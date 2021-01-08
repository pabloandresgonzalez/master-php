@extends('layouts.app')

@section('content')
<div class="container">

<div class="row justify-content-center">
<div class="col-md-8">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <strong>Prestamos UCC</strong><br>
                <h7 class="mb-0">Bienvenido! selecciona una opción el menú superior y realiza el préstamo del parqueadero de bicicleta o elemento que necesites.</h7>
              </div>
            </div>
          </div>
        </div>
</div>
</div>

<hr>

  <div class="row justify-content-center">
    <div class="col-md-6">



      @if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
      @endif




      <div class="row " style="display: flow-root;">
        <nav class="navbar navbar-light bg-light float-right" >
          <form class="form-inline">
            <input name="buscarporpre" class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </nav>
      </div>


      @foreach($prestamos as $prestamo)

      @include('includes.prestamo', ['prestamo'=>$prestamo])

      @endforeach

      <!-- Paginacion -->
      <div class="col-xs">
        <div class="pagination pagination-sm">
          <div class="clearfix"></div>
          {{$prestamos->links()}}
        </div>
      </div>

    </div>


      <div class="col-md-3">
        @if(Auth::user()->role == 'admin')
        <div class="card shadow" style=" margin-top: 54px;">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <strong>Notificacíon general</strong><br>
                <h7 class="mb-0">Eviar a todos los usuarios</h7>
              </div>
            </div>
          </div>
          <div class="card-body">

            <div class="form-group row">
              <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                <div class="col-md-10">
                  <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="" required autocomplete="modelo" autofocus>

                  @error('modelo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                  <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                  <div class="col-md-10">
                      <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="" required autocomplete="modelo" autofocus>

                      @error('modelo')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
              </div>

           </div>
        </div>
        @endif
      </div>

  </div>
</div>
@endsection
