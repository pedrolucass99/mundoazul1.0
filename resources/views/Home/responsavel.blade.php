@extends('layouts.meulayout')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                                <td>{{$responsavel['email']}}</td>
                                <td>{{$responsavel['telefone']}}</td>
                            </tr>
                        </tbody>
                    </table>
                <div class="card-body">
                    <a href="#" class="btn btn-danger">Responsável</a>
                     <a href="{{action('ResponsavelController@show', $responsavel['id'].'.criar')}}" class="btn btn-primary">Cadastrar Evento</a>
                    <a href="{{action('ResponsavelController@show', 'Profissionais')}}" class="btn btn-primary">Profissionais</a>
                </div>

            </div>
        </div>
    </div>
</div>
<br>
    <div class="container">
        <h3>Seus eventos</h3>
    </div>            
<table class="table table-striped" style="width: 70%;margin:20px auto;">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Evento</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach($evento as $evento)
        <tr>
          @if($evento['id_user'] == Auth::id())
            <td>{{$evento['nome_user']}}</td>
            <td><a href="{{action('ResponsavelController@show', '.show')}}" data-toggle="tooltip" data-placement="top" title="Ver descrição do evento">{{$evento['nome_evento']}}</a></td>
            <td><button class="btn btn-primary"><a href="{{action('ResponsavelController@show', $evento['id'].'.edit')}}" ><i class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Editar"></i></a></button></td>
            <td><button class="btn btn-danger" onclick="return confirm('Deseja excluir?')">
            <a href="{{action('ResponsavelController@show', $evento['id'].'.delete')}}"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Excluir"></i></a>
            </button></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
