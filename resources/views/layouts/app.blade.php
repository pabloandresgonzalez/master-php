<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PrestamosUCC') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logoucc.png')}}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="{{ asset('js/garphig.js') }}"  defer></script>
    <script src="{{ asset('js/graphig.js') }}"  defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">


          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('images/logoucc.png')}}"/>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('prestamo.create') }}">Audiovisuales</a>
              </li>

              @if(Auth::user()->role == 'admin' || Auth::user()->role == 'auxti' || Auth::user()->role == 'auxactivos' || (Auth::user()->role == 'user'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('prestamo.mobiliario') }}">Bienes fijos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('prestamo.parqueadero') }}">Parqueadero</a>
              </li>
              @endif
              @if(Auth::user()->role == 'admin')
              <li class="nav-item">
                <a class="nav-link" href="{{ route('activo.create') }}">Crear Activo</a>
              </li>
              <li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('activos') }}">Activos</a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
              </li>
                @include('includes.avatar')
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('profile', ['id'=>Auth::user()->id]) }}">
                    Perfil
                  </a>
                  <a class="dropdown-item" href="{{ route('config') }}">
                    Editar cuenta
                  </a>
                  <a class="dropdown-item" href="{{ route('bicicleta') }}">
                    Bicicleta
                  </a>
                  <a class="dropdown-item" href="{{ route('configbici') }}">
                    Nueva bicicleta
                  </a>
                  <a class="dropdown-item" href="{{ route('prestamos') }}">
                    Mis prestamos
                  </a>
                  <a class="dropdown-item" href="{{ route('configpass') }}">
                    Cambiar contraseña
                  </a>
                  @if(Auth::user()->role == 'admin')
                  <a class="dropdown-item" href="{{ url('/charts/prestamos/line') }}">
                    Frecuencia de prestamos
                  </a>
                  <a class="dropdown-item" href="{{ url('/charts/users/column') }}">
                    Prestamos por bloque
                  </a>
                  @endif


                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>

              @endguest
            </ul>
          </div>
        </div>
      </nav>

      <main class="py-4">
        @yield('content')
      </main>
    </div>
  </body>
</html>

<script type="text/javascript">
var counts =  <?php echo json_encode($counts ?? '') ?>;
</script>
