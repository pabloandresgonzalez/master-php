@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">

    @if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif

      <h1>Usuarios</h1>

      <div class="row " style="display: flow-root;" >
        <nav class="navbar navbar-light bg-light float-right" >
          <form class="form-inline">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </nav>
      </div>

      @foreach($users as $user)

      <div class="profile-user">
      @if(Auth::user()->image)
        <div class="container-avatar" >
        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" />
        </div>
        @endif

        <div class="user-info">
          <h2>{{ $user->name }}</h2>
          <h3>{{ $user->surname }}</h3>
          @if(Auth::user()->role == 'admin')
          <a href="{{ route('user.edit', ['id' => $user->id ]) }}" data-toggle="tooltip" title="Edita este usuario">
          <h4>{{ $user->role }}
          <img src="{{asset('images/icons9.png')}}"  class="activoeditar" /></h4>
          </a>
          @endif
          {{ 'Agregado '.\FormatTime::LongTimeFilter($user->created_at) }} <br/>
          {{ $user->celular }} <br/>
          {{ $user->email }}
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>

      @if(Auth::user()->role == 'admin' || Auth::user()->role == 'auxti' || Auth::user()->role == 'auxactivos')
      <div class="actions">
        @endif
      @endforeach

      <!-- Paginacion -->
      <div class="clearfix"></div>
      {{$users->links()}}
    </div>
  </div>
</div>
@endsection

