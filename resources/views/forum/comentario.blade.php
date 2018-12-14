@extends('layouts.meulayout')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="tudo">
            <div class="card">
    
                    <label style="text-align:center;"><b>Publicação</b></label> 
                    <form method="post" action="{{url('coments', $forum['id'])}}">
                @csrf
                            <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="publicacao" required="" value="{{$forum->publicacao}}" disabled="">
                                </div>
                            </div>

                            <input type="hidden" name="id_publicacao" value="{{$forum->id}}">

                            <div style="text-align:center; ">                            
                                <textarea style="width: 95%;border:3px solid black;border-radius: 15px;" name="comentario" placeholder="Escreva aki seu comentário" cols="30" rows="5"></textarea>
                            </div>
 
                    
                            <button type="submit" class="btn btn-success" style="margin-left: 3%; margin-top: 10px;">Enviar</button>
                            <div style="margin-top: 10px;"></div>                    
                   </form>
                   <br>
                   <table class="table table-striped" style="width: 70%;margin:20px auto;">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Comentário</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($comentario as $comentario)
      @if($comentario['id_publicacao'] == $forum['id'])
        @if($comentario['id_user'] == Auth::id())
            <tr>
                <td>{{$comentario['nome_user']}}</td>
                <td>{{$comentario['comentario']}}</td>
                <td><a href="#" class="btn btn-primary">Action</a></td>
            </tr>
        @else
            <tr>
                <td>{{$comentario['nome_user']}}</td>
                <td>{{$comentario['comentario']}}</td>
                <td><a href="#" class="btn btn-primary">Ver</a></td>
            </tr>
        @endif
      @endif
      @endforeach
    </tbody>
  </table>

            </div>    
        </div>        
    </div>
</div>

@endsection
