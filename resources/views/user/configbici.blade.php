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
                <div class="card-header">Mi bicicleta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bici.create') }}" enctype="multipart/form-data" arial-label="Configuración de mi cuenta">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" />
                        <input type="hidden" name="user_id" value="{{ Auth::user()->name}}" />
                        <input type="hidden" name="user_id" value="{{ Auth::user()->surname}}" />

                        
                                                

                        <div class="form-group row">
                            <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="" required autocomplete="modelo" autofocus>

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
                                <input id="serial" type="text" class="form-control @error('serial') is-invalid @enderror" name="serial" value="" required autocomplete="serial" autofocus>

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
                                <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="" required autocomplete="tipo" autofocus>

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
                                <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="" required autocomplete="color" autofocus>

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
                                @if(Auth::user()->image)
                                <img src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}" class="avatar" />
                                @endif
                                <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path">

                                @if ($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Para implementar cambio de contraseña 
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection