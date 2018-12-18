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
                    <form method="post" action="{{url('mensagem', $profissional->id)}}">
                @csrf
                            <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">   
                                    <input type="text" class="form-control" required="" disabled="" value="de : {{Auth::user()->name}}">
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4"></div>
                                <div class="form-group col-md-4">   
                                    <input type="text" class="form-control" required="" disabled="" value="para : {{$profissional->name}}">
                                </div>
                            </div>


                            <input type="hidden" name="para_user" value="{{$profissional->id}}">

                            <div style="text-align:center; ">                            
                                <textarea style="width: 95%;border:3px solid black;border-radius: 15px;" name="mensagem" placeholder="Escreva aqui seu comentário" cols="30" rows="5" required=""></textarea>
                            </div>
 
                    
                            <button type="submit" class="btn btn-success" style="margin-left: 3%; margin-top: 10px;">Enviar</button>
                            <div style="margin-top: 10px;"></div>                    
                   </form>
                   <br>
   
@endsection
