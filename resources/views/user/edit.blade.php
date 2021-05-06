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

      <div class="card">
        <div class="card-header">Editar rol de usuario  <strong>{{ $user->name }} {{$user->surname}}</strong> </div>

        <div class="card-body">
          <form method="POST" action="{{ route('user.updaterol') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}" />

            <div class="form-group row">
              <label for="role" class="col-md-3 col-form-label text-md-right">Cambiar rol</label>
              <div class="col-md-6">

                <select id="role" name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" >
                <option value="admin">Administrador</option>
                <option value="auxactivos">Auxiliar de activos</option>
                <option value="auxti">Auxiliar de TI</option>
                <option value="user">Usuario</option>
                </select>

                @if($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('role') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                  <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                      <div class="col" style="font-size: 12px">
                        <label for="name" style="margin-bottom: 1px" class="col-md-8">Nombres:  {{ $user->name }}</label><br>
                        <label for="surname" style="margin-bottom: 1px" class="col-md-8">Apellidos:  {{ $user->surname }}</label><br>
                        <label for="cedula" style="margin-bottom: 1px" class="col-md-8">Identificacion:  {{ $user->cedula }}</label><br>
                        <label for="email" style="margin-bottom: 1px" class="col-md-8">Email:  {{ $user->email }}</label><br>
                        <label for="celular" style="margin-bottom: 1px" class="col-md-8">Movil:  {{ $user->celular }}</label><br>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <br>
            <div class="form-group row">
              <div class="col-md-6 offset-md-3" >
                <input id="user_id" type="submit" class="btn btn-primary" value="Guardar cambios" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection