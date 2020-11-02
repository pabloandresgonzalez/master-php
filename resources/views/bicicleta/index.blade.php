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


      <h1>Mi Bicicleta</h1>
      <hr>
      <!-- Buscador de pagina
      <div class="row " style="display: flow-root;">
        <nav class="navbar navbar-light bg-light float-right">
          <form class="form-inline">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </nav>
      </div>
      -->

      @foreach($bicicletas as $bicicleta)

      @if(Auth::user()->id == $bicicleta->user_id)


      <div class="card pub-prestamo">

        <div class="card-header">
          <div class="prestamo">
            <a href="{{ route('bici.edit', ['id' => $bicicleta->id ]) }}" data-toggle="tooltip" title="Edita esta bicicleta"/>
            {{ 'Tipo  '.$bicicleta->tipo }}
            <span class="ciudad">
              {{' | '.$bicicleta->modelo}}
              <img src="{{asset('images/icons9.png')}}" class="activoeditar" />
            </span>
            </a>


            <div class="activo">
              {!! QrCode::size(70)->generate($bicicleta->serial); !!}
            </div></br>
            <div>
              <img src="{{ route('bici.avatar',['filename'=>$bicicleta->image]) }}" class="activobici" />
            </div>

          </div>
        </div>

        <div class="card-body body-prestamo">
          {{'Propietario: '.$bicicleta->user_name. ' '. $bicicleta->user_surname }} <br>
          {{'Modelo: '.$bicicleta->modelo }} <br>
          {{'Serial: '.$bicicleta->serial }} <br>
          {{'Tipo: '.$bicicleta->tipo }} <br>
          {{'Color: '.$bicicleta->color }} <br>
          {{'Color: '.$bicicleta->image }} <br>

        </div>

      </div>
      @endif
      @endforeach

      <!-- Paginacion -->
      <div class="clearfix"></div>
      {{$bicicletas->links()}}
    </div>

  </div>
  @endsection