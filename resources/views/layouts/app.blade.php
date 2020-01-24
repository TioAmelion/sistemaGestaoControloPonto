<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo','Sistema de Ponto')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md py-md-4">
            <div class="container">
                @guest
                @if (Route::has('register'))
                <a class="navbar-brand" href="#">
                    @yield('titulo','Sistema de Ponto') 
                </a>
                @endif
                        @else
                        <img src='{{asset("assests/$tema/logo.png")}}' class="h-25 d-inline-block" style="width: 55px">
                        <a class="navbar-brand" href="{{ url('/inicio') }}">
                    @yield('titulo','Sistema de Ponto') 
                </a>
                 <a class="navbar-brand" href="{{ url('Marcar_ponto') }}">
                    @yield('titulo','Ponto com Reconhecimento Facial') 
                </a>
                @endguest
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      <!-- img src='{{asset("assests/$tema/welcome.jpg")}}'-->
      <br><br><br><br>
    <!--   <div class="font-weight-bold p-3 mb-5 bg-white text-dark text-center">
            <p class="card-text font-weight-bold display-4 text-primary">Minimizando o tempo e esforço do R.H</p>

            <center>
          <img src='{{asset("assests/$tema/help.jpg")}}'>
      
      <div class="row">
    <div class="col-md-5 col-md-offset-1">
        <img src='{{asset("assests/$tema/time.jpg")}}'>
    </div>

    <div class="col-md-5">
        <img src='{{asset("assests/$tema/help.jpg")}}'>
    </div>
</div>
    </div>
      </center>
      </div> -->
      
        <main class="py-4">
            @yield('content')
        </main>
</body>
</html>


