@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">Editar prestamo</div>

        <div class="card-body">
          <form method="POST" action="{{ route('prestamo.update') }}" >
            @csrf


            <input type="hidden" name="prestamo_id" value="{{ $prestamo->id }}" />


            <div class="form-group row ">
              <label for="ciudad" class="col-md-3 col-form-label text-md-right">Ciudad</label>
              <div class="col-md-6">
                <input id="ciudad" type="text" name="ciudad" class="form-control {{ $errors->has('ciudad') ? 'is-invalid' : '' }}" value="{{ $prestamo->ciudad }}" required />

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
                <input id="bloque" type="text" name="bloque" class="form-control {{ $errors->has('bloque') ? 'is-invalid' : '' }}" value="{{ $prestamo->bloque }}" required />

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
                <input id="direccion" type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" value="{{ $prestamo->direccion }}" required />

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
                <input id="salon" type="text" name="salon" class="form-control {{ $errors->has('salon') ? 'is-invalid' : '' }}" value="{{ $prestamo->salon }}" required />

                @if($errors->has('salon'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('salon') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="programa" class="col-md-3 col-form-label text-md-right">Programa</label>
              <div class="col-md-6">
                <input id="programa" type="text" name="programa" class="form-control {{ $errors->has('programa') ? 'is-invalid' : '' }}" value="{{ $prestamo->programa }}" required />

                @if($errors->has('programa'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('programa') }}</strong>
                </span>
                @endif
              </div>
            </div>

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
              <label for="estado" class="col-md-3 col-form-label text-md-right">Cambiar estado</label>
              <div class="col-md-6">

                <select id="estado" name="estado" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" >
                <option value="En tramite">En tramite</option>
                <option value="En curso">En curso</option>
                <option value="Terminado">Terminado</option>
                </select>

                @if($errors->has('estado'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('estado') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="nombre_activo" class="col-md-3 col-form-label text-md-right">Activo</label>
              <div class="col-md-6">
                <input id="nombre_activo" type="text" name="nombre_activo" class="form-control {{ $errors->has('nombre_activo') ? 'is-invalid' : '' }}" value="{{$prestamo->nombre_activo}}" required />

                @if($errors->has('nombre_activo'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nombre_activo') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="serial" class="col-md-3 col-form-label text-md-right">Serial</label>
              <div class="col-md-6">
                <input id="serial" type="text" name="serial" class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" value="{{ $prestamo->serial }}" required />

                @if($errors->has('serial'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('serial') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="placa" class="col-md-3 col-form-label text-md-right">Placa / Codigo</label>
              <div class="col-md-6">
                <input id="placa" type="text" name="placa" class="form-control {{ $errors->has('placa') ? 'is-invalid' : '' }}" value="{{$prestamo->placa}}" required />

                @if($errors->has('placa'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('placa') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="referencia" class="col-md-3 col-form-label text-md-right">Referencia</label>
              <div class="col-md-6">
                <input id="referencia" type="text" name="referencia" class="form-control {{ $errors->has('referencia') ? 'is-invalid' : '' }}" value="{{$prestamo->referencia}}" required />

                @if($errors->has('referencia'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('referencia') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="cantidad" class="col-md-3 col-form-label text-md-right">Cantidad</label>
              <div class="col-md-6">
                <input id="cantidad" type="number" name="cantidad" class="form-control {{ $errors->has('cantidad') ? 'is-invalid' : '' }}" value="{{$prestamo->cantidad}}" required />

                @if($errors->has('cantidad'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('cantidad') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="salida_por" class="col-md-3 col-form-label text-md-right">Salida por:</label>
              <div class="col-md-6">

                <select id="salida_por" name="salida_por" class="form-control {{ $errors->has('salida_por') ? 'is-invalid' : '' }}" >
                <option value="No aplica">No aplica</option>
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

            <div class="form-group row">
              <label for="descripcion" class="col-md-3 col-form-label text-md-right">Observación</label>
              <div class="col-md-6">
                <textarea id="descripcion" type="text" name="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" value="{{ $prestamo->descripcion }}" required >{{ $prestamo->descripcion }}</textarea>

                @if($errors->has('descripcion'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group row">
              <div class="col-md-6 offset-md-3" >
                <input id="user_id" type="submit" class="btn btn-primary" value="Guardar cambios" />
                <a href="{{route('prestamo.detail', ['id' =>$prestamo->id]) }}" class="btn btn-light btn- activo">Regresar</a>
              </div>
            </div>



          </form>




        </div>

      </div>

    </div>
  </div>
</div>
@endsection

