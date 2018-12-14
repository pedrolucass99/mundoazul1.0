@extends('layouts.meulayout')

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
                <td><a href="{{action('ProfissionalController@show', $profissional['id_user'].'.ver')}}" class="btn btn-success">Ver Mensagem</a></td>
                <a href="#" class="btn btn-primary">Escrever Artigos</a>
                <a href="#" class="btn btn-primary">Escolas</a>

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

@endsection
