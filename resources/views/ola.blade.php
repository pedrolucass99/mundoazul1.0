@extends('layouts.app')
@section('content')

<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>QM</th>
				<th colspan="2">Ações</th>
			</tr>
		</thead>

		<tbody>
		@foreach($evento as $evento)
			<tr>
				<td>{{$evento['id']}}</td>
				<td>{{$evento['nome_user']}}</td>
				<td>{{$evento['descricao']}}</td>
				<td>{{$evento['quantidade_participante']}}</td>
				<td><a href="#" ><i class="fa fa-eye"></i></a></td>
				<td><a href="{{action('ResponsavelController@show', $evento['id'].'.add')}}" class="btn btn-primary">Participar</a></td>
			</tr>	
		@endforeach
		</tbody>
	</table>
</div>	

@endsection