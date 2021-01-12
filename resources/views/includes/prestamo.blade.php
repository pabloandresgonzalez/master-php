
<div class="card pub-prestamo">

  <div class="card-header">
    <div class="prestamo" >

      <a href="{{route('prestamo.detail', ['id' =>$prestamo->id]) }}" />
      {{ 'Prestamo # '.$prestamo->id }}
      <span class="ciudad">
        {{' | '.$prestamo->ciudad}}
      </span>
      </a>
    </div>

  </div>

  <div class="card-body body-prestamo">
    {{\FormatTime::LongTimeFilter($prestamo->created_at) }} <br>
    {{'Usuario: '.$prestamo->name_user }} <br>
    {{'Lugar / Bloque: '.$prestamo->bloque }} <br>
    {{'Salon / Oficina: '.$prestamo->salon }} <br>
    {{'Programa / Cargo: '.$prestamo->programa }} <br>
    <strong>Estado:</strong>
    @if($prestamo->estado == 'En tramite' || $prestamo->estado == 'En curso')
      <span class="badge badge-warning">{{ $prestamo->estado }}</span>
    @else
      <span class="badge badge-success">{{ $prestamo->estado }}</span>
    @endif
    <br>
    {{'Descripcion: '.$prestamo->descripcion }} <br>
  </div>

</div>

