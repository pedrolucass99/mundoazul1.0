<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mundo Azul</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:rgba(28, 74, 90, 0.901961);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:white;">
                    Mundo Azul
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
                                <a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Entrar') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('Cadastrar-se') }}</a>
                                @endif
                            </li>
                        @else

                      
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('forum')}}" style="color:white;">Fórum</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{action('InstituicaoController@show', '.show')}}" style="color:white;"> Projetos sociais</a>
                            </li>
                                  
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:white;">Artigos</a>
                            </li>
                                  
                            <li class="nav-item">
                                <a class="nav-link" href="{{action('ResponsavelController@show', '.show')}}" style="color:white;">Eventos</a>
                            </li>
                              
                             
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    @if(Auth::user()->tipo == 1)
                                     <a class="dropdown-item" href="{{action('ResponsavelController@edit', $responsavel['id'])}}">Editar dados</a>
                                    @endif

                                    @if(Auth::user()->tipo == 2)
                                     <a class="dropdown-item" href="{{action('ProfissionalController@edit',  $profissional['id'])}}" class="btn btn-warning">Editar dados</a>
                                    @endif

                                    @if(Auth::user()->tipo == 3)
                                     <a class="dropdown-item" href="{{action('InstituicaoController@edit', $instituicao['id'])}}" class="btn btn-warning">Editar dados</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
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
