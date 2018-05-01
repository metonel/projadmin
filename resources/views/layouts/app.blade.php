<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pagina admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('brand/logo.png') }}" height="50" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <span class="navbar-text">
                                autentificat ca: 
                              </span>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="" class="dropdown-item">Administrare cont</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Iesire cont') }}
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

        {{-- <main class="py-4"> --}}
        <div class="container py-3">
            <div class="row">
                <div class="col-2">

                    <div class="btn-group-vertical"> 

                        <button type="button" class="btn btn-lg btn-info font-weight-bld" disabled>Produse</button>                        
                        <a href="/comenzi" class="btn btn-light text-left">Administrare comenzi</a>
                        <a href="/addprod" class="btn btn-light text-left">Adauga produse</a>
                        <a href="/product" class="btn btn-light text-left">Administrare produse</a>
                        <a href="/addprod" class="btn btn-light text-left">Adauga categorie</a>
                        <a href="/addprod" class="btn btn-light text-left">Administrare categoriei</a>
                        <a href="/addprod" class="btn btn-light text-left">Adauga subcategorie</a>
                        <a href="/addprod" class="btn btn-light text-left">Administrare subcategorii</a>

                        <button type="button" class="btn btn-lg btn-info font-weigt-bold" disabled>Fisiere</button>                        
                        <a href="/comenzi" class="btn btn-light text-left">Adauga fisiere</a>
                        <a href="/addprod" class="btn btn-light text-left">Administrare fisiere</a>

                        <button type="button" class="btn btn-lg btn-info font-weigt-bold" disabled>Slider</button>                        
                        <a href="/comenzi" class="btn btn-light text-left">Adauga slide</a>
                        <a href="/addprod" class="btn btn-light text-left">Administrare slide-uri</a>

                        <button type="button" class="btn btn-lg btn-info font-weight-bld" disabled>Stiri</button>                        
                        <a href="/comenzi" class="btn btn-light text-left">Adauga stire</a>
                        <a href="/addprod" class="btn btn-light text-left">Administrare stire</a>
                    </div>

                </div>
                <div class="col">


                    @yield('content')


                </div>
            </div>
        </div>
        {{-- </main> --}}
    </div>
</body>
</html>
