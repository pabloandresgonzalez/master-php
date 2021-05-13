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
                <input id="bloque" type="text" name="bloque" class="form-control {{ $errors->has('bloque') ? 'is-invalid' : '' }}" required title="# de bloque donde dejas tu bicicleta" placeholder="# de bloque donde dejas tu bicicleta" />

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
                <input id="direccion" type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" required title="Direccion de bloque donde dejas tu bicicleta" placeholder="Direccion de bloque donde dejas tu bicicleta" />

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
                <input id="salon" type="text" name="salon" class="form-control {{ $errors->has('salon') ? 'is-invalid' : '' }}" required title="# de salon, programa o dependencia a la que perteneces" placeholder="# de salon, programa o dependencia a la que perteneces" />

                @if($errors->has('salon'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('salon') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="descripcion" class="col-md-3 col-form-label text-md-right">Observación</label>
              <div class="col-md-6">
                <textarea id="descripcion" type="text" name="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" value="" placeholder="P. ej.: Asistes o dictas clase, eres administrativo o visitante…" required ></textarea>

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

            <div class="form-group row">
              <label for="programa" hidden="true"  class="col-md-3 col-form-label text-md-right">Cargo / Rol</label>
              <div class="col-md-6">
                <input id="programa" value="{{ Auth::user()->role }}" type="text" name="programa" class="form-control {{ $errors->has('programa') ? 'is-invalid' : '' }}" hidden="true"  required title="Programa que cursas o tu cargo" placeholder="Estudiante o tu cargo" />

                @if($errors->has('programa'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('programa') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="celular" hidden="true"  class="col-md-3 col-form-label text-md-right">Movil</label>
              <div class="col-md-6">
                <input id="celular" type="number" value="{{ Auth::user()->celular }}" name="celular" class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}" value="" title="Tu numero de celular" placeholder="Tu numero de celular" hidden="true"  required />

                @if($errors->has('celular'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('celular') }}</strong>
                </span>
                @endif
              </div>
            </div>

          </form>

        </div>

      </div>

    </div>
  </div>
</div>
@endsection