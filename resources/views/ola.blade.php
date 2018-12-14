@extends('layouts.meulayout')

@section('content')

<link rel="stylesheet" href="{{asset('css/style.css')}}">

<section id="about">
   
  <div class="container">
     <header class="section-header">
       <h3>Eventos</h3>
       <p>Veja os eventos que acontecerão</p>
     </header>
		<div class="row about-cols">
					@foreach($evento as $evento)
				<div class="col-md-4 wow fadeInUp">
          <div class="about-col">
  				  <div class="img">
                <img src="img/about-mission.jpg" alt="" class="img-fluid">
                <div><i class="icon ion-ios-calendar-outline"></i></div>
            </div>
    				<h2 class="title">{{$evento['nome_evento']}}</h2>
    				<p class="text">{{$evento['descricao']}}</p>
    				<p class="text">{{$evento['quantidade_participante']}}</p>
    				<a href="{{action('ResponsavelController@show', $evento['id'].'.add')}}" class="btn btn-outline-info">Participar</a>
  				</div>
				</div>
  @endforeach
		</div>
  </div>
</section>
@endsection

