<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Profissional;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $profissional = \App\Profissional::find($id);
        $mensagem = \App\Mensagem::all();

        if(Auth::user()->tipo == 3){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            return view('chat/mensagem', compact('instituicao' ,'profissional', 'id'), compact('mensagem'));
        }

        else if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('chat/mensagem', compact('responsavel' ,'profissional', 'id'), compact('mensagem'));
        }

        if(Auth::user()->tipo == 2){
             $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
             $profissional = \App\Profissional::find($object->id);
             return view('chat/mensagem', compact('profissional','profissional', 'id'), compact('mensagem'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profissional = \App\Profissional::find($id);
        $mensagem = \App\Mensagem::all();

        if(Auth::user()->tipo == 3){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            return view('chat/mensage', compact('instituicao' ,'profissional', 'id'), compact('mensagem'));
        }

        else if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('chat/mensage', compact('responsavel' ,'forum', 'id'), compact('mensagem'));
        }

        /*if(Auth::user()->tipo == 2){
             $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
             $profissional = \App\Profissional::find($object->id);
             return view('chat/mensage', compact('profissional','forum', 'id'), compact('mensagem'));
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('para_user');

        $mensagem = new \App\Mensagem;
        $mensagem->de_user = Auth::id();
        $mensagem->para_user = $request->get('para_user');
        $mensagem->mensagem = $request->get('mensagem');
        $mensagem->save();

        //$profissional = \App\Profissional::find($id);
        //return ;

        return redirect('profissional/'.$id.'.menssagem');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
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
