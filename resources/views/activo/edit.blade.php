@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">Editar activo</div>

        <div class="card-body">
          <form method="POST" action="" >
            @csrf

            <input type="hidden" name="activo_id" value="{{ $activo->id }}" />


            <div class="form-group row">
              <label for="categoria" class="col-md-3 col-form-label text-md-right">Categoría</label>
              <div class="col-md-6">

                <select id="categoria" name="categoria" class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}" >
                <option value="1">TI</option>
                <option value="2">Mobiliario</option>
                <option value="3">Parquadero bici</option>
                </select>

                @if($errors->has('categoria'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('categoria') }}</strong>
                </span> 
                @endif
              </div>
            </div>
  
            <div class="form-group row">
              <label for="nombre" class="col-md-3 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input id="nombre" type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ $activo->nombre }}" required />

                @if($errors->has('nombre'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nombre') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="placa" class="col-md-3 col-form-label text-md-right">Placa</label>
              <div class="col-md-6">
                <input id="placa" type="text" name="placa" class="form-control {{ $errors->has('placa') ? 'is-invalid' : '' }}" value="{{ $activo->placa }}" required />

                @if($errors->has('placa'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('placa') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="marca" class="col-md-3 col-form-label text-md-right">Marca</label>
              <div class="col-md-6">
                <input id="marca" type="text" name="marca" class="form-control {{ $errors->has('marca') ? 'is-invalid' : '' }}" value="{{ $activo->marca }}" required />

                @if($errors->has('marca'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('marca') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="modelo" class="col-md-3 col-form-label text-md-right">Modelo</label>
              <div class="col-md-6">
                <input id="modelo" type="text" name="modelo" class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}" value="{{ $activo->modelo }}" required />

                @if($errors->has('modelo'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('modelo') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="serial" class="col-md-3 col-form-label text-md-right">Serial</label>
              <div class="col-md-6">
                <input id="serial" type="text" name="serial" class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" value="{{ $activo->serial }}" required />

                @if($errors->has('serial'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('serial') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="descripcion" class="col-md-3 col-form-label text-md-right">Descripción</label>
              <div class="col-md-6">
                <textarea id="descripcion" type="text" name="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" value="{{ $activo->descripcion }}" required >{{ $activo->descripcion }}</textarea>

                @if($errors->has('descripcion'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('descripcion') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-6 offset-md-3" >
                <input id="user_id" type="submit" class="btn btn-primary" value="Editar" /> 
                <a href="{{ route('home') }}" class="btn btn-light btn- activo">Regresar</a>              
              </div>
            </div>             

          </form>

        </div>

      </div>

    </div>
  </div>
</div>
@endsection

