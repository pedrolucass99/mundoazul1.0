<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $projeto = new \App\Projeto_social;
            $projeto->id_user = Auth::id();
            $projeto->nome_user = Auth::user()->name;
            $projeto->nome_projeto = $request->get('nome_projeto');
            $projeto->hora = $request->get('hora');
            $projeto->data = $request->get('data');
            $projeto->descricao = $request->get('descricao');

            $projeto->save();

            //$evento = \App\Evento::all();
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
            $projeto = \App\Projeto_social::find($id);
            $projeto->id_user = Auth::id();
            $projeto->nome_user = Auth::user()->name;
            $projeto->nome_projeto = $request->get('nome_projeto');
            $projeto->hora = $request->get('hora');
            $projeto->data = $request->get('data');
            $projeto->descricao = $request->get('descricao');

            $projeto->save();

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
