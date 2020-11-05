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
        <div class="card-header">Editar rol de usuario  <strong>{{ $user->name }}</strong> </div>

        <div class="card-body">
          <form method="POST" action="{{ route('user.updaterol') }}" enctype="multipart/form-data">
            @csrf


            <div class="form-group row">
              <label for="role" class="col-md-3 col-form-label text-md-right">Cambiar rol</label>
              <div class="col-md-6">

                <select id="role" name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" >
                <option value="admin">Administrador</option>
                <option value="auxactivos">Auxiliar de auxactivos</option>
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

            <hr>

            <div class="form-group row ">
              <label for="role" class="col-md-3 col-form-label text-md-right">Id</label>
              <div class="col-md-6">
                <input id="user_id" type="text" name="user_id" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" value="{{ $user->id }}" readonly="readonly" required />

                @if($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('role') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row ">
              <label for="role" class="col-md-3 col-form-label text-md-right">{{ __('Rol') }}</label>
              <div class="col-md-6">
                <input id="" type="text" name="" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" value="{{ $user->role }}" readonly="readonly" required />

                @if($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('role') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombres') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $user->name }}" readonly="readonly" required />

                @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="surname" class="col-md-3 col-form-label text-md-right">{{ __('Apellidos') }}</label>
              <div class="col-md-6">
                <input id="surname" type="text" name="surname" class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" value="{{ $user->surname }}" readonly="readonly" required />

                @if($errors->has('surname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('surname') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group row">
              <label for="cedula" class="col-md-3 col-form-label text-md-right">{{ __('Idetificacion') }}</label>
              <div class="col-md-6">
                <input id="cedula" type="text" name="cedula" class="form-control {{ $errors->has('cedula') ? 'is-invalid' : '' }}" value="{{ $user->cedula }}" readonly="readonly" required />

                @if($errors->has('cedula'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('cedula') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" readonly="readonly" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                        </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="celular" class="col-md-3 col-form-label text-md-right">Movil</label>

                  <div class="col-md-6">
                    <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ $user->celular }}" readonly="readonly" required autocomplete="celular" autofocus>

                    @error('celular')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="form-group row">

              </div>
              <!-- Ocional si se permite que el admin cambie la img de avatar del usuario
                {{--
              <div class="form-group row">
                <label for="image_path" class="col-md-3 col-form-label text-md-right">{{ __('Avatar') }}</label>

                  <div class="col-md-6">
                     @if(Auth::user()->image)
                      <img src="{{ route('user.avatar',['filename'=> $user->image]) }}" class="avatar" />
                    @endif
                      <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path"  >

                    @if ($errors->has('image_path'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                      </span>
                    @endif
                  </div>
              </div>
              --}}
            -->


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