@extends('layouts.meulayout')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</style>
</head>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="tudo">
            <div class="card">
                
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
                
                <td><a href="{{action('ProfissionalController@show', $profissional['id_user'].'.ver')}}" class="btn btn-info">Ver Mensagem</a></td>
                <a href="#" class="btn btn-primary">Escrever Artigos</a>
          

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                </div>
            </div>
        </div>   -->
    <div class="container">
<div class="main-content">
    <div class="container">
        <h3 class="site-title">{{ Auth::user()->name }}</h3>
        <div class="row">
            <div class="col-m-9">
                <div class="row">
                 <div class="panel">
                <div class=" panel-body ">
                   
                    <div class="col-md-5">
                        <img class="img-responsive" src="/images/{{$profissional->filename}}" >
                        <i class="fa fa-wrench"> </i>
            <div class=" clearfix">
               
                <h4>Profissional:{{ $profissional['especializacao'] }}</h4>

               <hr>
                    </div>
                     </div>
                    </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
                <a href="{{action('ProfissionalController@show', $profissional['id_user'].'.ver')}}" class="btn btn-info">Ver Mensagem</a></td>
                <a href="{{action('ProfissionalController@edit',  Auth::id())}}" class="btn btn-primary">Editar conta</a>
                 
                          </div>
<!--                 @if(Auth::user()->tipo == 2)                               
                    <div class="card" id="teste">
                        <div class="card-header">Seu perfil profissional, {{ Auth::user()->name }}</div>
                        <div class="card-body">
                            <img src="/images/{{$profissional->filename}}" height="100" width="250">
                        <p class="title"></p>
                            <a href="#"><i class="fa fa-dribbble"></i></a> 
                            <a href="#"><i class="fa fa-twitter"></i></a> 
                            <a href="#"><i class="fa fa-linkedin"></i></a> 
                            <a href="#"><i class="fa fa-facebook"></i></a> 
                       
                        </div>
                    </div>
            @endif -->
    </div>
</div>

@endsection
