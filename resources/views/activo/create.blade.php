@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">Creación de activo</div>

        <div class="card-body">
          <form method="POST" action="{{ route('activo.save') }}" enctype="multipart/form-data" >
            @csrf


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
              <label for="nombre" class="col-md-3 col-form-label text-md-right">Nombre / Bloque</label>
              <div class="col-md-6">
                <input id="nombre" type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" required />

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
                <input id="placa" type="text" name="placa" class="form-control {{ $errors->has('placa') ? 'is-invalid' : '' }}" required />

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
                <input id="marca" type="text" name="marca" class="form-control {{ $errors->has('marca') ? 'is-invalid' : '' }}" required />

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
                <input id="modelo" type="text" name="modelo" class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}" required />

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
                <input id="serial" type="text" name="serial" class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" required />

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
                <textarea id="descripcion" type="text" name="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" value="" required ></textarea>

                @if($errors->has('descripcion'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
                @endif
              </div>
            </div>

              <div class="form-group row ">
                <div class="col-md-6 offset-md-3">
                  <button type="submit" class="btn btn-primary">
                    Crear activo
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

