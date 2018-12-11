@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mundo Azul</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
        <td>{{Auth::user()->name}}</td>
        <td>{{$profissional['especializacao']}}</td>
        <td><a href="{{action('ProfissionalController@show', $profissional['id_user'].'.menssagem')}}" class="btn btn-success">Mensagem</a></td>

        <td><a href="{{action('ProfissionalController@show', $profissional['id_user'].'.ver')}}" class="btn btn-success">Ver Mensagem</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
@endsection