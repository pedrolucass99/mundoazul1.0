<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Profissional;
use Responsavel;
use Instituicao;
use Auth;
use Forum;
use DB;


class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $forum = \App\Forum::find($id);
        $comentario = \App\Comentario::all();

        if(Auth::user()->tipo == 3){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            return view('forum/comentario', compact('instituicao' ,'forum', 'id'), compact('comentario'));
        }

        else if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('forum/comentario', compact('responsavel' ,'forum', 'id'), compact('comentario'));
        }

        if(Auth::user()->tipo == 2){
             $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
             $profissional = \App\Profissional::find($object->id);
             return view('forum/comentario', compact('profissional','forum', 'id'), compact('comentario'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comentario = new \App\Comentario;

        $comentario->id_user = Auth::id();
        $comentario->nome_user = Auth::user()->name;
        $comentario->id_publicacao = $request->get('id_publicacao');
        $comentario->comentario = $request->get('comentario');

        $comentario->save();

        $id = $request->get('id_publicacao');

        $forum = \App\Forum::find($id);
        
        $comentario = \App\Comentario::all();
        
        
        if(Auth::user()->tipo == 3){
            //$object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            //$instituicao = \App\Instituicao::find($object->id);
            //return view('forum/comentario', compact('instituicao' ,'forum', 'id'));
            return redirect('coments/'.$id); 
        }

        else if(Auth::user()->tipo == 1){
            //$object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            //$responsavel = \App\Responsavel::find($object->id);
            //return view('forum/comentario', compact('responsavel' ,'forum', 'id'));
            return redirect('coments/'.$id); 
        }

        if(Auth::user()->tipo == 2){
            //$object = DB::table('profissionals')->where('id_user', Auth::id())->first();
            //$profissional = \App\Profissional::find($object->id);
            //compact('profissional', 'forum', 'id'), compact('comentario'));
            return redirect('coments/'.$id); 
         }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
