@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h1>Mis prestamos</h1>
      <hr/>

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
