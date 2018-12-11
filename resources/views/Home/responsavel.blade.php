@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
}

.title {
    color: grey;
    font-size: 18px;
}

button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}

a {
    text-decoration: none;
    font-size: 22px;
    color: black;
}

button:hover, a:hover {
    opacity: 0.7;
}
#teste{
    width: 200px;
    height: 200px;
}
</style>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="tudo">
            <div class="card">
                

                <div class="card-header"><b>Responsável : {{ Auth::user()->name }}</b></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{$responsavel['telefone']}}</td>
                                <td>{{$responsavel['email']}}</td>
                            </tr>
                        </tbody>
                    </table>
                <div class="card-body">
                    <a href="#" class="btn btn-danger">Responsável</a>
                     <a href="{{action('ResponsavelController@show', $responsavel['id'].'.criar')}}" class="btn btn-primary">Cadastrar Evento</a>
                    <a href="#" class="btn btn-primary">Profissionais</a>
                    <a href="{{action('ResponsavelController@show', 'Profissionais')}}" class="btn btn-primary">Mensagens</a>
                </div>

</div>
</div>
</div>
</div>

               
               
<table class="table table-striped" style="width: 70%;margin:20px auto;">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Publicação</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach($evento as $evento)
        <tr>
          @if($evento['id_user'] == Auth::id())
            <td>{{$evento['nome_user']}}</td>
            <td><a href="#">{{$evento['descricao']}}</a></td>
            <td><a href="{{action('ResponsavelController@show', $evento['id'].'.edit')}}" class="btn btn-warning">Editar dados</a></td>
            <td>
            <a class="btn btn-danger" href="{{action('ResponsavelController@show', $evento['id'].'.delete')}}">delete</a>
            </td>
          @else
            <td>{{$evento['nome_user']}}</td>
            <td> <a href="{{url('coments', $evento['id'])}}">{{$evento['nome_user']}}</a></td>
            <td> <a href="#" class="btn btn-primary">Ver</a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
