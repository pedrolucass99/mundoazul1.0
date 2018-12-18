@extends('layouts.meulayout')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="tudo">
            <div class="card">
                @auth
                    <label style="text-align:center;"><b>Publicação</b></label> 
                    <form method="post" action="{{url('forum')}}">
                @csrf
                        <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="nome_user" required="" value="{{Auth::user()->name}}" disabled="">
                                </div>
                        </div>
                    
                        <div class="row">
                          <div class="col-md-4"></div>
                            <div class="form-group col-md-4">                           
                              <textarea " name="publicacao" placeholder="Digite aqui" cols="30" rows="5" required=""></textarea>
                            </div>
                        </div> 
                    
                            <button type="submit" class="btn btn-success" style="margin-left: 3%; margin-top: 10px;">Enviar</button>
                            <div style="margin-top: 10px;"></div>                    
                     </form>
                @endauth    
            </div>    
        </div>        
    </div>
</div>

<table class="table table-striped" style="width: 70%;margin:20px auto;">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Publicação</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach($forum as $forum)
        <tr>
          @if($forum['id_user'] == Auth::id())
            <td>{{$forum['nome_user']}}</td>
            <td><a href="{{url('coments', $forum['id'])}}">{{$forum['publicacao']}}</a></td>
            <td><a href="{{action('ForumController@edit', $forum['id'])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Editar"></i></a></td>
            <td>
              <form action="{{action('ForumController@destroy', $forum['id'])}}" method="post">
              @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit" onclick="return confirm('Deseja excluir?')"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Excluir"></i></button>
              </form>
            </td>
          @else
            <td>{{$forum['nome_user']}}</td>
            <td> <a href="{{url('coments', $forum['id'])}}">{{$forum['publicacao']}}</a></td>
            <td> <a href="#" class="btn btn-primary">Ver</a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>


@endsection
