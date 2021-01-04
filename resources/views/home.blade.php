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

      <h1>Prestamos UCC</h1>
      <hr>

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
      <div class="clearfix"></div>
      {{$prestamos->links()}}
    </div>

  </div>
</div>
@endsection
