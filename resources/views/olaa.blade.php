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
				<th>Id</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th colspan="2">Ações</th>
			</tr>
		</thead>

		<tbody>
		@foreach($projeto as $projeto)
			<tr>
				<td>{{$projeto['id']}}</td>
				<td>{{$projeto['nome_user']}}</td>
				<td>{{$projeto['descricao']}}</td>
				<td><a href="#" class="btn btn-primary">Ver</a></td>
			</tr>	
		@endforeach
		</tbody>
	</table>
</div>	
</body>
</html>
@endsection