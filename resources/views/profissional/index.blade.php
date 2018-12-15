@extends('layouts.meulayout')

@section('content')

   
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Especialização</th>
        <th>Mensagem</th>
      </tr>
    </thead>
    <tbody>
      @foreach($profissional as $profissional)
      <tr>
        <td>{{$profissional['nome_user']}}</td>
        <td>{{$profissional['especializacao']}}</td>
        <td >
       
          <a href="{{action('ProfissionalController@show', $profissional['id_user'].'.menssagem')}}" ><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="Mensagens"></i>
       
        </td>

        <td><a href="{{action('ProfissionalController@show', $profissional['id_user'].'.ver')}}"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Visualizar mensagens"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  </div>

@endsection