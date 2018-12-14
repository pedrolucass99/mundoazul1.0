@extends('layouts.meulayout')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="tudo">
            <div class="card">
                <div class="card-header"><b>Instituição : {{$instituicao['nome']}} </b></div>
                   <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>Rua</th>
                                <th>Quantidade de membros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$instituicao['cidade']}}</td>
                                <td>{{$instituicao['bairro']}}</td>
                                <td>{{$instituicao['rua']}}</td>
                                <td>{{$instituicao['quant_membros']}}</td>
                            </tr>
                        </tbody>
                    </table>
                <div class="card-body">
                <a href="#" class="btn btn-info">Instituição</a>
                <a href="{{action('InstituicaoController@show', $instituicao['id'].'.criar')}}" class="btn btn-primary">Cadastrar Projeto</a>
         

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

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
      @foreach($projetos as $projeto)
        <tr>
          @if($projeto['id_user'] == Auth::id())
            <td>{{$projeto['nome_user']}}</td>
            <td><a href="#">{{$projeto['descricao']}}</a></td>
            <td><a href="{{action('InstituicaoController@show', $projeto['id'].'.edit')}}" class="btn btn-warning">Editar dados</a></td>
            <td>
            <a class="btn btn-danger" href="{{action('InstituicaoController@show', $projeto['id'].'.delete')}}">delete</a>
            </td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
