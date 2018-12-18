@extends('layouts.meulayout')
@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profissional</title>
  </head>
  <body>
    <div class="container">
      <h2>Cadastre seus dados</h2><br/>
      <form method="post" action="{{url('profissional')}}" enctype="multipart/form-data">
        @csrf
         
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="id_user" value="{{Auth::id()}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Nome">Nome:</label>
            <input type="text" class="form-control" name="nome" required="" value="{{Auth::user()->name}}" disabled="">
          </div>
        </div>


          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Numero_conselho">Numero conselho:</label>
              <input type="text" class="form-control" name="numero_conselho" required="">
            </div>
          </div>
         
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Especializacao">Especialização:</label>
            <input type="text" class="form-control" name="especializacao" required="">
          </div>
        </div>

         <!-- <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                        <div class="input-group">
            <div class="input-group-btn">
              <button tabindex="-1" class="btn btn-default" type="button">Select</button>
              <button tabindex="-1" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
              <span class="caret"></span>
              </button>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#">
                <input type="checkbox" value="1"><span class="lbl"> Every day</span>
                </a></li>

              </ul>
            </div>
            <input type="text" class="form-control">
          </div>
            </div>
        </div> -->

            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <input type="file" name="filename">    
              </div>
            </div>
              <div class="row">
                <div class="col-md-4"></div>
                <label>Instituições</label>
                <select name="instituicao">
                  <option value="nenhuma instituição vinculada">Instituição</option>
                  @foreach($instituicaos as $instituicao)
                    <option value="nenhuma instituição vinculada">{{$instituicao['nome']}}</option>
                  @endforeach
                </select>
                
              </div>
<br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
        </div>
      </form>
      <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4";>
            <a href="{{action('HomeController@index')}}"><button type="submit"  class="btn btn-danger">Cancelar</button></a>
          </div>
      </div>
    </div>
  
  </body>
</html>

@endsection













