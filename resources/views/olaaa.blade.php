@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Menssagem</th>
			</tr>
		</thead>

		<tbody>
		@foreach($mensagem as $mensagem)
			<tr>
			@if(Auth::user()->tipo == 1)
				@if($mensagem['de_user'] == Auth::id() and $mensagem['para_user'] == $profissional->id)
					<td>{{Auth::user()->name}} : {{$mensagem['mensagem']}}</td>
				@endif()
			
				@if($mensagem['para_user'] == Auth::id() and $mensagem['de_user'] == $profissional->id)
					<td>{{$profissional->name}} : {{$mensagem['mensagem']}}</td>
				@endif
			@endif

			@if(Auth::user()->tipo == 2)
				@if($mensagem['de_user'] == Auth::id() and $mensagem['para_user'] == $profissional->id)
					<td>{{Auth::user()->name}} : {{$mensagem['mensagem']}}</td>
				@endif()
			
				@if($mensagem['para_user'] == Auth::id() and $mensagem['de_user'] == 3)
					<td>{{$profissional->name}} : {{$mensagem['mensagem']}}</td>
				@endif
			@endif		
			</tr>	
		@endforeach
		</tbody>
	</table>
</div>	
</body>
</html>
@endsection