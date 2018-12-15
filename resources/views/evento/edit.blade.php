@extends('layouts.meulayout')

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
      <h2>Editar Evento</h2><br/>
      <form method="post" action="{{url('criar/edite/'. $evento['id'])}}">
        @csrf
        
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Nome">Dê um nome ao evento</label>
              <input type="text" class="form-control" name="nome_evento" required="" value="{{$evento->nome_evento}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="rua">Rua</label>
              <input type="text" class="form-control" name="rua" required="" value="{{$evento->rua}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="numero">Número</label>
              <input type="text" class="form-control" name="numero" required="" value="{{$evento->numero}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" name="bairro" required="" value="{{$evento->bairro}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" name="cidade" required="" value="{{$evento->cidade}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Horario">Horário</label>
              <input type="time" class="form-control" name="hora" required="" value="{{$evento->hora}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Data">Data do Evento</label>
              <input type="date" class="form-control" name="data" required="" value="{{$evento->data}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">                           
          <textarea " name="descricao" placeholder="Escreva a descrição da atividade" cols="30" rows="5">{{$evento->descricao}}</textarea>
        </div>
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













