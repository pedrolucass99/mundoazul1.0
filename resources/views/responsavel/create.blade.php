@extends('layouts.meulayout')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mundo Azul</title>
   
  </head>
  <body>
    <div class="container">
      <h2>Criar Responsável</h2><br/>
      <form method="post" action="{{url('responsavel')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nome">Nome:</label>
            <input type="text" class="form-control" name="nome" value="{{Auth::user()->name}}" disabled="">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Cpf">CPF</label>
              <input id="cpf" type="text" class="form-control" name="cpf_user" value="{{ Auth::user()->cpf }}" disabled="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Idade">Email</label>
              <input type="text" class="form-control" name="email" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Idade">Telefone</label>
              <input type="text" class="form-control" name="telefone" required="">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:-50px; margin-left:560px";>
            <a href="{{action('HomeController@index')}}"><button type="submit"  class="btn btn-danger">Cancelar</button></a>
          </div>
        </div>
    </div>
  
  </body>
</html>
@endsection










