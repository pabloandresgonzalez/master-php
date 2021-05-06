@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">Prestamo Activo Fijo</div>

        <div class="card-body">
          <form method="POST" action="{{ route('prestamo.save') }}" >
            @csrf

            <div class="form-group row">
              <label for="ciudad" class="col-md-3 col-form-label text-md-right">Ciudad</label>
              <div class="col-md-6">

                <select id="ciudad" name="ciudad" title="Selecciona el area al que pertenece el articulo" class="form-control {{ $errors->has('ciudad') ? 'is-invalid' : '' }}" >
                <option value="Apartadó">Apartadó</option>
                <option value="Arauca">Arauca</option>
                <option value="Barrancabermeja">Barrancabermeja</option>
                <option value="Bogotá">Bogotá</option>
                <option value="Bucaramanga">Bucaramanga</option>
                <option value="Cali">Cali</option>
                <option value="Ibagué - Espina">Ibagué - Espinal</option>
                <option value="Medellín - Envigado">Medellín - Envigado</option>
                <option value="Montería">Montería</option>
                <option value="Neiva">Neiva</option>
                <option value="Pasto">Pasto</option>
                <option value="Pereira - Cartago">Pereira - Cartago</option>
                <option value="Popayán">Popayán</option>
                <option value="Quibdó">Quibdó</option>
                <option value="Cali">Cali</option>
                <option value="Santa Marta">Santa Marta</option>
                <option value="Villavicencio">Villavicencio</option>
                </select>

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
                <input id="bloque" type="text" name="bloque" class="form-control {{ $errors->has('bloque') ? 'is-invalid' : '' }}" required title="Numero de bloque al que perteneces" placeholder="Numero de bloque al que perteneces"/>

                @if($errors->has('bloque'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('bloque') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="direccion" class="col-md-3 col-form-label text-md-right">Direccion Casa</label>
              <div class="col-md-6">
                <input id="direccion" type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" required title="Direccion donde vas a ubicar el equipo" required placeholder="Direccion donde vas a ubicar el equipo"/>

                @if($errors->has('direccion'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('direccion') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="salon" class="col-md-3 col-form-label text-md-right">Dependencia</label>
              <div class="col-md-6">
                <input id="salon" type="text" name="salon" class="form-control {{ $errors->has('salon') ? 'is-invalid' : '' }}" required title="Programa o dependencia a la que perteneces" placeholder="Programa o dependencia a la que perteneces"/>

                @if($errors->has('salon'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('salon') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="programa" class="col-md-3 col-form-label text-md-right">Cargo / rol</label>
              <div class="col-md-6">
                <input id="programa" type="text" name="programa" class="form-control {{ $errors->has('programa') ? 'is-invalid' : '' }}" required title="Estudiante o tu cargo" placeholder="Estudiante o tu cargo"/>

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
                <input id="celular" type="number" name="celular" class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}" value="" title="Tu numero de celular" required placeholder="Tu numero de celular" />

                @if($errors->has('celular'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('celular') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="descripcion" class="col-md-3 col-form-label text-md-right">Descripción</label>
              <div class="col-md-6">
                <textarea id="descripcion" type="text" name="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" value="" placeholder="P. ej.: Que solicitas, para que lo solicitas…" title="Que solicitas " required ></textarea>

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