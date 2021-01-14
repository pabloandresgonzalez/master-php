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
                <h7 class="mb-0">Bienvenido! selecciona una opción del menú superior y realiza préstamos del parqueadero para bicicletas o los elementos que necesites.</h7>
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
            <input name="buscarporpre" class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search" autofocus>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Buscar</button>
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

       @if(Auth::user()->role == 'admin')
      <div class="col-md-3">
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

          <form action="{{ url('/fcm/send')}}" method="Post">
            @csrf

            <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label" >{{ __('Titulo') }}</label>

                <div class="col-md-10">
                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ config('app.name') }}" placeholder="{{ config('app.name') }}" required autocomplete="title" autofocus>

                  @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                  <label for="body" class="col-md-6 col-form-label ">{{ __('Mensaje') }}</label>

                  <div class="col-md-10">
                      <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" rows="2" value="" required autocomplete="body" autofocus></textarea>

                      @error('body')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
              </div>

              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enviar notificacion</button>

          </form>


           </div>
        </div>
      </div>
      @endif


  </div>
</div>
@endsection
