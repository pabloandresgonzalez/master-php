@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Orden de salida</div>
          <div class="card-body">

            <img src="{{ route('prestamo.avatar',['filename'=>$prestamo->image]) }}" class="avatarordendetail" />

          </div>
      </div>
        <a href="{{ route('home') }}" class="btn btn-light btn- activo">Regresar</a>
      </div>

    </div>
  </div>
  @endsection