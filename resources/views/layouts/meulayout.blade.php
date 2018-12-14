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
                    <li><a title="team" href="{{url('forum')}}">Forum</a></li>
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

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Produzido por <a href="https://www.ifpe.edu.br/">Alunos IFPE/Igarassu</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>