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
              <label for="Local">Local</label>
              <input type="text" class="form-control" name="local" value="{{$evento->local}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Horario">Horário</label>
              <input type="text" class="form-control" name="hora" value="{{$evento->hora}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Data">Data do Evento</label>
              <input type="text" class="form-control" name="data" value="{{$evento->data}}">
            </div>
          </div>

        <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">                           
                  <textarea class="form-control" name="descricao" placeholder="Editar comentário" cols="30" rows="5" required=""></textarea>
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













