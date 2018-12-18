@extends('layouts.meulayout')

@section('content')

<section id="about">
  <div class="container">
     <header class="section-header">
       <h3>Eventos</h3>
       <p>Veja os eventos que acontecerão</p>
     </header>
		<div class="row about-cols">
					@foreach($evento as $key=>$evento)
				<div class="col-md-4 wow fadeInUp" data-wow-delay="0.{{$key}}s">
          <div class="about-col">
  				  <div class="img">
                <img src="img/about-mission.jpg" alt="" class="img-fluid">
                <div><i class="icon ion-ios-calendar-outline"></i></div>
            </div><br>
    				<h2 class="title">{{$evento['nome_evento']}}</h2>
            <p class="text">Rua: {{$evento['rua']}} Número: {{$evento['numero']}}</p>
            <p class="text">Bairro: {{$evento['bairro']}} Cidade: {{$evento['cidade']}}</p>
            <p class="text">Hora: {{$evento['hora']}} Data: {{$evento['data']}}</p>
            <div class="center">
            <a data-toggle="collapse" href="#collapseExample{{$key}}" role="button" aria-expanded="false" aria-controls="collapseExample">Detalhes</a>
            </div>
              <div class="collapse" id="collapseExample{{$key}}">
                <p class="text">{{$evento['descricao']}}</p>
              
    				  <p class="text">número de participantes: {{$evento['quantidade_participante']}}</p>
              </div>
    				<div>
            <a href="{{action('ResponsavelController@show', $evento['id'].'.add')}}" class="btn btn-secondary">Participar</a>
            </div>
  				</div>
				</div>
  @endforeach
		</div>
  </div>

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <!-- <script type="text/javascript">

   $(document).ready(function() {
    $('.btn-outline-info').addClass('disabled');
   });
  </script> -->
</section>
@endsection