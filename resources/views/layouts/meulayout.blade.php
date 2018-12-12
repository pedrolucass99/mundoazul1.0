<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Mundo Azul</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Mundo Azul</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
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
                    <li><a title="team" href="#skills">Artigos</a></li>
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
         </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
           <main class="py-4" style="margin-top: 100px;">
            @yield('content')
        </main>