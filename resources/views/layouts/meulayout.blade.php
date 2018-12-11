<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mundo Azul</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>   

<body>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Mundo Azul</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                 @auth
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('forum')}}">Fórum</a>
                    </li>
                                  
                    <li class="nav-item">
                      <a class="nav-link" href="#">Projetos sociais</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="#">Artigos</a>
                    </li>
                                  
                    <li class="nav-item">
                      <a class="nav-link" href="#">Publicações</a>
                    </li>
                    
                    <li>
                      <a href="{{url('/home')}}">{{ Auth::user()->name }}</a>
                    </li>
                @else
                    <li><a title="team" href="#about">Forum</a></li>
                    <li><a title="services" href="#services">Projetos sociais</a></li>
                    <li><a href="{{url('instituicao')}}">Instituições</a></li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                     <li class="nav-item">
                        @if (Route::has('register'))
                             <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                        @endif
                    </li>
                @endauth
            </div>
          </div>
        </div>
      </nav>

  

          <main class="py-4">
            @yield('content')
        </main>
</body>        