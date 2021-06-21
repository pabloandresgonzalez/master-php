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

      <h1>Perfil</h1>
      <hr/>

      <div class="profile-user">

        @if($user->image)
        <div class="container-avatar" >
          <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" />
        </div>
        @endif

        <div class="user-info">
          <h3>{{ $user->name.' '.$user->surname }}</h3>
          <h4>{{ $user->role }}</h4>
          {{ 'Agregado '.\FormatTime::LongTimeFilter($user->created_at) }} <br/>
          {{ $user->celular }} <br/>
          {{ $user->email }}<br/>
          {!! QrCode::size(70)->generate($user->cedula); !!}

        </div>
      </div>


      <div class="clearfix"></div>

    </div>

  </div>
</div>
@endsection
