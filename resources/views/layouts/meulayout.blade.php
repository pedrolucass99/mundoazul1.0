<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>Mundo Azul</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->

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

  <link href="/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
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
        <h1><a href="{{url('/')}}" class="scrollto">Mundo Azul</a></h1>
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
                      <a class="nav-link" href="{{action('InstituicaoController@show', '.show')}}">Projetos sociais</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="#">Artigos</a>
                    </li>
                                  
                    <li class="nav-item">
                      <a class="nav-link" href="{{action('ResponsavelController@show', '.show')}}">Eventos</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('home')}}">{{Auth::user()->name}}</a>
                    </li>

                    <li class="nav-item">
                        @if(Auth::user()->tipo == 1)
                          <a class="nav-link" href="{{action('ResponsavelController@edit', Auth::id())}}">Editar dados</a>
                        @endif

                        @if(Auth::user()->tipo == 2)
                          <a class="nav-link" href="{{action('ProfissionalController@edit',  Auth::id())}}" class="btn btn-warning">Editar dados</a>
                        @endif

                        @if(Auth::user()->tipo == 3)
                          <a class="nav-link" href="{{action('InstituicaoController@edit', Auth::id())}}" class="btn btn-warning">Editar dados</a>
                        @endif
                    </li>
                    
                     <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();                         
                                  document.getElementById('logout-form').submit();">
                              {{ __('Sair') }}
                            </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
            

                 @else
                    <li><a title="team" href="#about">Forum</a></li>
                    <li><a title="team" href="#services">Projetos sociais</a></li>
                    <li><a title="services" href="#skills">Artigos</a></li>
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
  
  <main class="cotainer" >
      @yield('content')
  </main>


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/superfish/hoverIntent.js"></script>
  <script src="/lib/superfish/superfish.min.js"></script>
  <script src="/lib/wow/wow.min.js"></script>
  <script src="/lib/waypoints/waypoints.min.js"></script>
  <script src="/lib/counterup/counterup.min.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="/lib/lightbox/js/lightbox.min.js"></script>
  <script src="/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/js/main.js"></script>
</body>
</html>