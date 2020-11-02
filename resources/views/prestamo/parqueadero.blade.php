@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">Prestamo parqueadero de bicicleta</div>

        <div class="card-body">
          <form method="POST" action="{{ route('prestamo.save') }}" >
            @csrf


            <div class="form-group row ">
              <label for="ciudad" class="col-md-3 col-form-label text-md-right">Ciudad</label>
              <div class="col-md-6">
                <input id="ciudad" type="text" name="ciudad" class="form-control {{ $errors->has('ciudad') ? 'is-invalid' : '' }}" required />

                @if($errors->has('ciudad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('ciudad') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="bloque" class="col-md-3 col-form-label text-md-right">Bloque</label>
              <div class="col-md-6">
                <input id="bloque" type="text" name="bloque" class="form-control {{ $errors->has('bloque') ? 'is-invalid' : '' }}" required />

                @if($errors->has('bloque'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('bloque') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="direccion" class="col-md-3 col-form-label text-md-right">Direccion</label>
              <div class="col-md-6">
                <input id="direccion" type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" required />

                @if($errors->has('direccion'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('direccion') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="salon" class="col-md-3 col-form-label text-md-right">Salon / Oficina</label>
              <div class="col-md-6">
                <input id="salon" type="text" name="salon" class="form-control {{ $errors->has('salon') ? 'is-invalid' : '' }}" required />

                @if($errors->has('salon'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('salon') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="programa" class="col-md-3 col-form-label text-md-right">Cargo / Programa</label>
              <div class="col-md-6">
                <input id="programa" type="text" name="programa" class="form-control {{ $errors->has('programa') ? 'is-invalid' : '' }}" required />

                @if($errors->has('programa'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('programa') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <!-- 
            <div class="form-group row">
              <label for="salida_por" class="col-md-3 col-form-label text-md-right">Salida por:</label>
              <div class="col-md-6">

                <select id="salida_por" name="salida_por" class="form-control {{ $errors->has('salida_por') ? 'is-invalid' : '' }}" >
                <option value="Prestamo">Prestamo</option>
                <option value="Definitiva">Definitiva</option>
                <option value="Evento">Evento</option>
                <option value="Reparacion">Reparacion</option>
                </select>

                @if($errors->has('salida_por'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('salida_por') }}</strong>
                </span> 
                @endif
              </div>
            </div>
            -->

            <div class="form-group row">
              <label for="celular" class="col-md-3 col-form-label text-md-right">Movil</label>
              <div class="col-md-6">
                <input id="celular" type="number" name="celular" class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}" value="{{ Auth::user()->celular }}" required />

                @if($errors->has('celular'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('celular') }}</strong>
                </span> 
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="descripcion" class="col-md-3 col-form-label text-md-right">Observación</label>
              <div class="col-md-6">
                <textarea id="descripcion" type="text" name="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" value="" required ></textarea>

                @if($errors->has('descripcion'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('descripcion') }}</strong>
                </span> 
                @endif
              </div>
            </div>
                                   

            <div class="form-group row">

              <div class="col-md-6 offset-md-3" >
                <input id="user_id" type="submit" class="btn btn-primary" value="Hacer solicitud" />

              </div>
            </div>

          </form>

        </div>

      </div>

    </div>
  </div>
</div>
@endsection