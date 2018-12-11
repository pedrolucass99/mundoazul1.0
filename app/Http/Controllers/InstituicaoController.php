<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituicao = \App\Instituicao::all();
        return view('instituicao/index', compact('instituicao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instituicao/create');
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
        $user->tipo = 3;
        $user->save();


        $instituicao = new \App\Instituicao;
        $instituicao->id_user = Auth::id();
        $instituicao->nome = $request->get('nome');
        $instituicao->cep = $request->get('cep');
        $instituicao->rua = $request->get('rua');
        $instituicao->bairro = $request->get('bairro');
        $instituicao->cidade = $request->get('cidade');
        $instituicao->uf = $request->get('uf');
        $instituicao->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        $ids = explode('.', $id);

        if($ids[1] == "criar"){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            return view('projeto/create', compact('instituicao'));
        }

        if($ids[1] == "delete"){
            $id = $ids[0];
            $projeto = \App\Projeto_social::find($id);
            $projeto->delete();
            return redirect('home');
        }

        if($ids[1] == "edit"){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            $id = $ids[0];
            
            $projeto = \App\Projeto_social::find($id);
            return view('projeto/edit', compact('instituicao','projeto','id'));
        }

        if($id == ".show"){
            if(Auth::user()->tipo == 1){
                $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
                $responsavel = \App\Responsavel::find($object->id);
                $projeto = \App\Projeto_social::all();
                return view('olaa', compact('projeto'), compact('responsavel'));
            }

            if(Auth::user()->tipo == 2){
                $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
                $profissional = \App\Profissional::find($object->id);
                $projeto = \App\Projeto_social::all();
                return view('olaa', compact('projeto'), compact('profissional'));
            }

            if(Auth::user()->tipo == 3){
                $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
                $instituicao = \App\Instituicao::find($object->id);
                $projeto = \App\Projeto_social::all();
                return view('olaa', compact('projeto'), compact('instituicao'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituicao = \App\Instituicao::find($id);
        return view('instituicao/edit', compact('instituicao', 'id'));
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
        $instituicao = \App\Instituicao::find($id);
        $instituicao->nome = $request->get('nome');
        $instituicao->cep = $request->get('cep');
        $instituicao->cidade = $request->get('cidade');
        $instituicao->bairro = $request->get('bairro');
        $instituicao->rua = $request->get('rua');
        $instituicao->uf = $request->get('uf');
        $instituicao->save();

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
        $instituicao = \App\Instituicao::find($id);
        $instituicao->delete();
        return redirect('instituicao')->with('success', 'Instituição Deletada');
    }
}
