@extends('layouts.meulayout')
@section('content')

<section id="services">
<header class="section-header">
       <h3>Seus projetos sociais</h3>
			@foreach($projeto as $projeto)
       <p>Olá, {{$projeto['nome_user']}}</p>
     </header>
<div class="container">     
	<div class="row">
	        <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
           <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
           <h4 class="title"><a href="">{{$projeto['nome_projeto']}}</a></h4>
           <p class="description">{{$projeto['descricao']}}</p>
         </div>
			@endforeach

	
	</div>
</div>
</section>
@endsection