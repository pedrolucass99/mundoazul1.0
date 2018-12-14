<?php

namespace App\Http\Controllers;

use Auth;
use Instituicao;
use DB;
use Responsavel;
use Mensagem;
use User;


use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissional = \App\Profissional::all();
        return view('profissional/index', compact('profissional'));
    }

    public function forum($id){
        $profissional = \App\Profissional::find($id);
        return view('forum', compact('profissional','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituicaos = \App\Instituicao::all();
        return view('profissional/create', compact('instituicaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $user = \App\User::find(Auth::id());
        $user->tipo = 2;
        $user->save();

        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }

        $profissional = new \App\Profissional;
        $profissional->id_user = $request->get('id_user');
        $profissional->numero_conselho = $request->get('numero_conselho');
        $profissional->especializacao = $request->get('especializacao');
        $profissional->filename = $name;
        $profissional->instituicao = $request->get('instituicao');
        $profissional->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $id = explode('.', $id);

        if($id[1] == "menssagem"){
            $i = $id[0];
            if(Auth::user()->tipo == 1){
                $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
                $responsavel = \App\Responsavel::find($object->id);
                $profissional = \App\User::find($i);
                $mensagem = \App\Mensagem::all();
                return view('chat/mensagem',compact('responsavel'), compact('profissional', 'i'), compact('mensagem'));
            }

            if(Auth::user()->tipo == 2){
                $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
                $profissional = \App\Profissional::find($object->id);
                $user = \App\User::all()->where('tipo', 2);
                return view('chat/mensagem', compact('profissional'), compact('user'));
            }

            if(Auth::user()->tipo == 3){
                $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
                $instituicao = \App\Instituicao::find($object->id);
                return view('chat/mensagem', compact('instituicao'));
            }
        }

        if($id[1] == "ver"){
            $mensagem = \App\Mensagem::all();

            if(Auth::user()->tipo == 1){
                $id = $id[0];

                $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
                $responsavel = \App\Responsavel::find($object->id);
                $profissional = \App\User::find($id);
                return view('olaaa',compact('responsavel', 'profissional'),compact('mensagem'));
            }

            if(Auth::user()->tipo == 2){
                $id = $id[0];

                $object = DB::table('responsavels')->where('id_user', 3)->first();
                $responsavel = \App\Responsavel::find($object->id);
                $profissional = \App\User::find($id);
                return view('olaaa',compact('responsavel', 'profissional'),compact('mensagem'));
            }

            if(Auth::user()->tipo == 3){
                $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
                $instituicao = \App\Instituicao::find($object->id);
                return view('chat/mensagem', compact('instituicao'));
            }

            return view('olaaa', compact('mensagem'));

        }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituicaos = \App\Instituicao::all();
        //return view('profissional/create', compact('instituicaos'));

        $profissional = \App\Profissional::find($id);
        return view('profissional/edit', compact('instituicaos', 'profissional', 'id'));
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
        $user = \App\User::find(Auth::id());
        $user->name = $request->get('nome');;
        $user->save();

        $profissional = \App\Profissional::find($id);
        $profissional->numero_conselho = $request->get('numero_conselho');
        $profissional->especializacao = $request->get('especializacao');
        $profissional->instituicao = $request->get('instituicao');
        $profissional->save();

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
        $profissional = \App\Profissional::find($id);
        $profissional->delete();
        return redirect('profissional')->with('success', 'Profissional Apagado');
    }

}
