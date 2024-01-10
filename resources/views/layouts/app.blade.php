<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body data-bs-theme="dark">
    
    <main class="d-flex flex-nowrap">         
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{ asset('images/logo.png') }}">
            <span class="fs-4">CommandNet</span>
          </a>
          <hr>

          <ul class="nav nav-pills flex-column mb-auto">

            @if (Route::has('sections'))
                <li class="nav-item">
                    <a href="{{ route('sections') }}" class="text-white nav-link{{ Request::is('sections') ? ' active' : '' }}">
                        <span class="mdi mdi-map-marker-alert-outline"></span>
                        Einsatzabschnitte
                    </a>
              </li>
            @endif

            @if (Route::has('personal'))
                <li class="nav-item">
                    <a href="{{ route('personal') }}" class="text-white nav-link{{ Request::is('personal') ? ' active' : '' }}">
                        <span class="mdi mdi-account-group"></span>
                        Personalübersicht
                    </a>
              </li>
            @endif

            @if (Route::has('map'))
            <li class="nav-item">
                <a href="{{ route('map') }}" class="text-white nav-link{{ Request::is('map') ? ' active' : '' }}">
                    <span class="mdi mdi-map"></span>
                    Lagekarte
                </a>
            </li>
            @endif

            @if (Route::has('material'))
            <li class="nav-item">
                <a href="{{ route('material') }}" class="text-white nav-link{{ Request::is('material') ? ' active' : '' }}">
                    <span class="mdi mdi-pipe-wrench"></span>
                    Material
                </a>
            </li>
            @endif

            @if (Route::has('diary'))
            <li class="nav-item">
                <a href="{{ route('diary') }}" class="text-white nav-link{{ Request::is('diary') ? ' active' : '' }}">
                    <span class="mdi mdi-notebook"></span>
                    Einsatztagebuch
                </a>
            </li>
            @endif

            @if (Route::has('messages'))
            <hr>
            <li class="nav-item">
                <a href="{{ route('messages') }}" class="text-white nav-link{{ Request::is('messages') ? ' active' : '' }}">
                    <span class="mdi mdi-note-multiple"></span>
                    Meldungen
                </a>
            </li>
            @endif

          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="#">Benutzer wechseln</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Benutzerverwaltung</a></li>
              <li><a class="dropdown-item" href="#">Einstellungen</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
            </ul>
          </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <main class="container-fluid" id="content-container">
            @yield('content')
        </main>      

        @stack('endscripts')

</body>
</html>
