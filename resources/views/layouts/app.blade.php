<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Gestion De Acreditaciones Scouts</title>
    <link type="text/css" rel="stylesheet" href="{{ url('css/mdb.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ url('css/bootstrap.css') }}"  media="screen,projection"/>
    <script src="{{ url('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</head>
<body>
<body class="grey lighten-3">
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">
        <a class="navbar-brand waves-effect">
          <strong class="blue-text">OpenScouts</strong>
        </a>
          <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('nomina') }}" class="nav-link">Acreditaciones</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('asamblea') }}" class="nav-link">Asamblea</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('asamblea/oradores') }}" class="nav-link">Oradores</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Usuario <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            @endauth
          </ul>

      </div>
    </nav>
    <!-- Navbar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      @auth
        @if (trim($__env->yieldContent('titulo')))
        <div class="card mb-4 wow fadeIn">
            <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <span>@yield('titulo')</span>
            </h4>
            </div>
        </div>
        @endif
      @endauth
      <div class="">
        @yield('content')
      </div>
      <br><br>
    </div>
  </main>
</body>
</html>
