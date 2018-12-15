@extends('layouts.meulayout')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Criar evento</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
      
  </head>
  <body>
    <div class="container">
      <h2>Criar Evento</h2><br/>
      <form method="post" action="{{url('criar', '.create')}}">
        @csrf        
          
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Nome">Dê um nome ao evento</label>
              <input type="text" class="form-control" name="nome_evento" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="rua">Rua</label>
              <input type="text" class="form-control" name="rua" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="numero">Número</label>
              <input type="text" class="form-control" name="numero" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" name="bairro" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" name="cidade" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Horario">Horário</label>
              <input type="time" class="form-control" name="hora" required="">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Data">Data do Evento</label>
              <input type="date" class="form-control" name="data" required="">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">                           
          <textarea " name="descricao" placeholder="Escreva a descrição da atividade" cols="30" rows="5"></textarea>
        </div>
      </div>  
      

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" >
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  
  </body>
</html>

@endsection













