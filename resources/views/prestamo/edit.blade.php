@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">Editar prestamo</div>

        <div class="card-body">
          <form method="POST" action="{{ route('prestamo.update') }}" enctype="multipart/form-data" >
            @csrf


            <input type="hidden" name="prestamo_id" value="{{ $prestamo->id }}" />


          <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                  <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                      <div class="col" style="font-size: 12px">
                        <label for="ciudad" style="margin-bottom: 1px" class="col-md-8">Ciudad: {{ $prestamo->ciudad }}</label><br>
                        <label for="bloque" style="margin-bottom: 1px" class="col-md-8">Bloque: {{ $prestamo->bloque }}</label><br>
                        <label for="direccion" style="margin-bottom: 1px" class="col-md-8">Direccion: {{ $prestamo->direccion }}</label><br>
                        <label for="salon" style="margin-bottom: 1px" class="col-md-8">Salon / Oficina: {{ $prestamo->salon }}</label><br>
                        <label for="programa" style="margin-bottom: 1px" class="col-md-8">Programa: {{ $prestamo->programa }}</label><br>
                        <label for="celular" style="margin-bottom: 1px" class="col-md-8">Movil: {{ $prestamo->celular }}</label><br>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <br>

          @if($prestamo->estado == 'En tramite')

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

            @else

            <div class="form-group row">
              <label for="estado" class="col-md-3 col-form-label text-md-right">Cambiar estado</label>
              <div class="col-md-6">

                <select id="estado" name="estado" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" >
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

            @endif



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

            @if($prestamo->estado == 'En tramite')

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
                <label for="image_path" class="col-md-3 col-form-label text-md-right">{{ __('Orden de salida') }}</label>

                <div class="col-md-6">

                        <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path"  >

                    @if ($errors->has('image_path'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            @else

            <div class="form-group row">
              <label for="salida_por" class="col-md-3 col-form-label text-md-right">Salida por:</label>

              <div class="col-md-6">
                <select id="salida_por" name="salida_por" class="form-control {{ $errors->has('salida_por') ? 'is-invalid' : '' }}" >
                <option value="{{ $prestamo->salida_por}}">{{ $prestamo->salida_por}}</option>

                </select>

                @if($errors->has('salida_por'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('salida_por') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
                    <label for="image_path" class="col-md-3 col-form-label text-md-right">{{ __('Orden de salida') }}</label>

                    <div class="col-md-6">
                      <br>
                      <a href="{{ route('prestamo.orden', ['id' =>$prestamo->id]) }}" target="-blank" >
                        <img src="{{ route('prestamo.avatar',['filename'=>$prestamo->image]) }}" class="avatar" />
                      </a>
                        <input disabled id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" value="{{ route('bici.avatar',['filename'=>$prestamo->image]) }}" />

                        @if ($errors->has('image_path'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image_path') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            @endif


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