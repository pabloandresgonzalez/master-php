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
        <div class="card-header">Editar mi bicicleta</div>

        <div class="card-body">
            <form method="POST" action="{{ route('bici.update') }}" enctype="multipart/form-data" arial-label="Configuración de mi cuenta">
                @csrf

                <input type="hidden" name="id" value="{{ $bicicleta->id}}" />
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" />
                <input type="hidden" name="user_name" value="{{ Auth::user()->name}}" />
                <input type="hidden" name="user_surname" value="{{ Auth::user()->surname}}" />
                <input type="hidden" name="cedula" value="{{ Auth::user()->cedula}}" />


                <div class="form-group row">
                    <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                    <div class="col-md-6">
                        <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{$bicicleta->modelo}}" required autocomplete="modelo" autofocus>

                        @error('modelo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="serial" class="col-md-4 col-form-label text-md-right">{{ __('Nº Serie') }}</label>

                    <div class="col-md-6">
                        <input id="serial" type="text" class="form-control @error('serial') is-invalid @enderror" name="serial" value="{{$bicicleta->serial}}" required autocomplete="serial" autofocus>

                        @error('serial')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                    <div class="col-md-6">
                        <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{$bicicleta->tipo}}" required autocomplete="tipo" autofocus>

                        @error('tipo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                    <div class="col-md-6">
                        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{$bicicleta->color}}" required autocomplete="color" autofocus>

                        @error('color')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">

                </div>

                <div class="form-group row">
                    <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                    <div class="col-md-6">
                        <img src="{{ route('bici.avatar',['filename'=>$bicicleta->image]) }}" class="avatar" />

                        <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" accept="image/*">

                        @if ($errors->has('image_path'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image_path') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger activoborrar " data-toggle="modal" data-target="#exampleModal">
                            Eliminar
                        </button>
                    </div>
                </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirma la eliminacion de la bicileta</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Esta acción eliminará definitivamente el activo y no se podrá recuperar después. ¿Estás seguro de que deseas continuar?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <a href="{{ route('bici.delete', ['id' => $bicicleta->id]) }}" class="btn btn-danger">Eliminar</a>
                    </div>
                  </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection