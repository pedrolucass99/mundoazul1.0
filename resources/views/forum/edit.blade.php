@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="tudo">
            <div class="card">
    
                    <label style="text-align:center;"><b>Publicação</b></label> 
                    <form method="post" action="{{action('ForumController@update', $forum['id'])}}">
                @csrf
                        <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="nome_user" required="" value="{{$forum->nome_user}}" disabled="">
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="publicacao" required="" value="{{$forum->publicacao}}" disabled="">
                                </div>
                            </div>

                            <div style="text-align:center; ">                            
                                <textarea style="width: 95%;border:3px solid black;border-radius: 15px;" name="publicacao" placeholder="Escreva aki sua edição" cols="30" rows="5"></textarea>
                            </div>
 
                    
                            <button type="submit" class="btn btn-success" style="margin-left: 3%; margin-top: 10px;">Enviar</button>
                            <div style="margin-top: 10px;"></div>                    
                   </form>
            </div>    
        </div>        
    </div>
</div>



@endsection
