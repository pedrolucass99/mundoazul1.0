@extends('layouts.meulayout')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="tudo">
            <div class="card">
                

                @if(Auth::user()->tipo == 0)
                <div class="card-header">Seja Bem-vindo, {{ Auth::user()->name }}!</div>
                     <a href="{{url('responsavel/create')}}" class="btn btn-primary">Sou Responsável</a>
                        <a href="{{url('instituicao/create')}}" class="btn btn-warning">Instituição</a>
                        <a href="{{url('profissional/create')}}" class="btn btn-danger">Sou Profissional</a>
                <div class="card-body">
                @endif



                @if(Auth::user()->tipo == 1)
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
                     <a href="{{action('ResponsavelController@show', $responsavel['id'].'.criar')}}" class="btn btn-primary">Sou Responsável</a>
                    <a href="#" class="btn btn-primary">Escolas</a>
                </div>

               
                @endif

                @if(Auth::user()->tipo == 2)
                <div class="card-header"><b>Profissional : {{ Auth::user()->name }}</b>!</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Especialização</th>
                                <th>Instituição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{$profissional['especializacao']}}</td>
                                <td>{{$profissional['instituicao']}}</td>
                            </tr>
                        </tbody>
                    </table>
                <div class="card-body">
                <a href="#" class="btn btn-danger">Profissional</a>
                <a href="#" class="btn btn-primary">Dúvidas dos pais</a>
                <a href="#" class="btn btn-primary">Escrever Artigos</a>
                <a href="#" class="btn btn-primary">Escolas</a>
                @endif 

                @if(Auth::user()->tipo == 3)
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
                <a href="#" class="btn btn-danger">Instituição</a>
                <a href="#" class="btn btn-primary">Cadastrar Eventos</a>
                @endif     

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                </div>
            </div>
        </div>
                @if(Auth::user()->tipo == 2)                               
                    <div class="card" id="teste">
                        <div class="card-header">Seu perfil profissional, {{ Auth::user()->name }}</div>
                        <div class="card-body">
                        <p class="title"></p>
                            <a href="#"><i class="fa fa-dribbble"></i></a> 
                            <a href="#"><i class="fa fa-twitter"></i></a> 
                            <a href="#"><i class="fa fa-linkedin"></i></a> 
                            <a href="#"><i class="fa fa-facebook"></i></a> 
                        <p><button style="width: 100%;background-color: black;color: white;padding: 10pt;">Contato</button></p>
                        </div>
                    </div>
            @endif
    </div>
</div>

@if(Auth::user()->tipo == 1)
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
            <td><a href="{{url('coments', $evento['id'])}}">{{$evento['descricao']}}</a></td>
            <td><a href="{{action('ResponsavelController@show', $evento['id'].'.edit')}}" class="btn btn-warning">Editar dados</a></td>
            <td>
            <a class="btn btn-danger" href="{{action('ResponsavelController@show', $evento['id'].'.delete')}}">delete</a>
              <!-- <form action="{{action('ResponsavelController@show', $evento['id'].'.delete')}}" method="post">
              @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit" onclick="return confirm('Deseja excluir?')" >Delete</button>
              </form> -->
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
@endif

@endsection
