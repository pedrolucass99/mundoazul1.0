@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Criar evento</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>
  <body>
    <div class="container">
      <h2>Criar Evento</h2><br/>
      <form method="post" action="{{url('criar', '.create')}}">
        @csrf        
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Local">Local</label>
              <input type="text" class="form-control" name="local">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Horario">Horário</label>
              <input type="text" class="form-control" name="hora">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Data">Data do Evento</label>
              <input type="text" class="form-control" name="data">
            </div>
          </div>

        <div style="text-align:center; ">                            
          <textarea style="width: 32%;border:3px solid black;border-radius: 15px;" name="descricao" placeholder="Escreva a descrição da atividade" cols="30" rows="5"></textarea>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  
  </body>
</html>

@endsection













