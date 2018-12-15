<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Profissional;
use Responsavel;
use Instituicao;
use Auth;
use DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento = \App\Evento::all();
        return view('evento/index', compact('evento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('evento/create');

        if(Auth::user()->tipo == 3){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            return view('evento/create', compact('instituicao'));
        }

        else if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('evento/create', compact('responsavel'));
        }

        else if(Auth::user()->tipo == 2){
            $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
            $profissional = \App\Profissional::find($object->id);
            return view('evento/create', compact('profissional'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new \App\Evento;
            $evento->id_user = Auth::id();
            $evento->nome_user = Auth::user()->name;
            $evento->nome_evento = $request->get('nome_evento');
            $evento->rua = $request->get('rua');
            $evento->numero = $request->get('numero');
            $evento->bairro = $request->get('bairro');
            $evento->cidade = $request->get('cidade');
            $evento->hora = $request->get('hora');
            $evento->data = $request->get('data');
            $evento->descricao = $request->get('descricao');

            $evento->save();

            $evento = \App\Evento::all();
            return redirect('home');
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
        $evento = \App\Evento::find($id);

            $evento->id_user = Auth::id();
            $evento->nome_user = Auth::user()->name;
            $evento->nome_evento = $request->get('nome_evento');
            $evento->rua = $request->get('rua');
            $evento->numero = $request->get('numero');
            $evento->bairro = $request->get('bairro');
            $evento->cidade = $request->get('cidade');
            $evento->hora = $request->get('hora');
            $evento->data = $request->get('data');
            $evento->descricao = $request->get('descricao');

            $evento->save();                                                                                                                                            
            $evento = \App\Evento::all();
            return redirect('home');
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
