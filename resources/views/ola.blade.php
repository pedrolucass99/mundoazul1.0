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
            </div>
    				<h2 class="title">{{$evento['nome_evento']}}</h2>
            <p class="text">{{$evento['descricao']}}</p>
            <label for="" id="{{$key}}"><a href="#">Local:</a>
              <div style="display: none;" id="a{{$key}}">
              <li>{{$evento['rua']}}</li>
              <li>{{$evento['numero']}}</li>
              <li>{{$evento['bairro']}}</li>
              <li>{{$evento['cidade']}}</li>
              </div>
            </label>
            <p class="text">Hora: {{$evento['hora']}}</p>
    				<p class="text">Data: {{$evento['data']}}</p>
    				<p class="text">número de participantes: {{$evento['quantidade_participante']}}</p>
    				<a href="{{action('ResponsavelController@show', $evento['id'].'.add')}}" class="btn btn-outline-info">Participar</a>
  				</div>
				</div>
  @endforeach
		</div>
  </div>

  <script type="text/javascript">
    var a = document.getElementById("1");
    var b = document.getElementById('a1');
    a.onmouseover = function() {
      b.style.display = 'block';
    }

    a.onmouseout = function() {
      b.style.display = 'none';
    }
  </script>
</section>
@endsection