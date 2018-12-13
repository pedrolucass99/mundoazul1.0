@extends('layouts.app')

@section('content')
   
<div class="container">
     <header class="section-header wow fadeInUp">
       <h3>Eventos</h3>
       <p>Veja os eventos que acontecerão</p>
     </header>
		<div class="row">
					@foreach($evento as $evento)
				<div class="card col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="margin: 4px;" >
  				<img class="card-img-top" src="..." alt="Card image cap">
  				<div class="card-body">
    				<h5 class="card-title">{{$evento['nome_evento']}}</h5>
    				<p class="card-text">{{$evento['descricao']}}</p>
    				<p class="card-text">{{$evento['quantidade_participante']}}</p>
    				<a href="{{action('ResponsavelController@show', $evento['id'].'.add')}}" class="btn btn-primary">Participar</a>
  				</div>
				</div>
  @endforeach
		</div>
</div>
@endsection
