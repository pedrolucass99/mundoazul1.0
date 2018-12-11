<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Evento;
use Participar_evento;
use Profissional;
class ResponsavelController extends Controller
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
        return view('responsavel/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $user = \App\User::find(Auth::id());
        $user->tipo = 1;
        $user->save();


        $responsavel = new \App\Responsavel;
        $responsavel->id_user = Auth::id();
        $responsavel->nome = Auth::user()->name;
        $responsavel->cpf_user = Auth::user()->cpf;
        $responsavel->telefone = $request->get('telefone');
        $responsavel->email = $request->get('email');
        $responsavel->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        
        // //if(Auth::user()->tipo == 3){
        //     $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
        //     $instituicao = \App\Instituicao::find($object->id);
        //     return view('forum/index', compact('forum', 'instituicao'));
        // }

        $ids = explode('.', $id);

        if($id == ".show"){
            if(Auth::user()->tipo == 1){
                $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
                $responsavel = \App\Responsavel::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('responsavel'));
            }

            if(Auth::user()->tipo == 2){
                $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
                $profissional = \App\Profissional::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('profissional'));
            }

            if(Auth::user()->tipo == 3){
                $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
                $instituicao = \App\Instituicao::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('instituicao'));
            }
        }

        if($id == "Profissionais"){
            if(Auth::user()->tipo == 1){
                $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
                $responsavel = \App\Responsavel::find($object->id);
                $profissional = \App\Profissional::all();
                return view('profissional/index', compact('profissional'), compact('responsavel'));
            }

            if(Auth::user()->tipo == 2){
                $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
                $profissional = \App\Profissional::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('profissional'));
            }

            if(Auth::user()->tipo == 3){
                $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
                $instituicao = \App\Instituicao::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('instituicao'));
            }
        }

        if($ids[1] == "criar"){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('evento/create', compact('responsavel'));
        }

        if($ids[1] == "add"){
            $id = $ids[0];
            $evento = \App\Evento::find($id);
            $evento->quantidade_participante += 1;
            $evento->save();

            $events = new \App\Participar_evento;
            $events->id_user = Auth::id();
            $events->id_event = $id;
            $events->save();

            

            if(Auth::user()->tipo == 1){
                $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
                $responsavel = \App\Responsavel::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('responsavel'));
            }

            if(Auth::user()->tipo == 2){
                $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
                $profissional = \App\Profissional::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('profissional'));
            }

            if(Auth::user()->tipo == 3){
                $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
                $instituicao = \App\Instituicao::find($object->id);
                $evento = \App\Evento::all();
                return view('ola', compact('evento'), compact('instituicao'));
            }

        }

        if($ids[1] == "edit"){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            $id = $ids[0];
            
            $evento = \App\Evento::find($id);
            return view('evento/edit', compact('responsavel','evento', 'id'));
        }

        // if($id[1] == "create"){
        //     $evento = new \App\Evento;
        //     $evento->id_user = Auth::id();
        //     $evento->nome_user = Auth::user()->name;
        //     $evento->local = $request->get('local');
        //     $evento->horario = $request->get('horario');
        //     $evento->data = $request->get('data');
        //     $evento->descricao = $request->get('descricao');

        //     $evento->save();
        //     return "kkk";
        // }

        if($ids[1] == "delete"){
            $id = $ids[0];
            $evento = \App\Evento::find($id);
            $evento->delete();
            return redirect('home');
        }

        if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('evento/create', compact('responsavel'));
        }

        // else if(Auth::user()->tipo == 2){
        //     $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
        //     $profissional = \App\Profissional::find($object->id);
        //     return view('forum/index', compact('forum', 'profissional'));
        // }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsavel = \App\Responsavel::find($id);
        return view('responsavel/edit', compact('responsavel', 'id'));
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
        $user->cpf = $request->get('cpf_user');
        $user->name = $request->get('nome');
        $user->save();

        $responsavel = \App\Responsavel::find($id);
        $responsavel->nome = $request->get('nome');
        $responsavel->cpf_user = $request->get('cpf_user');
        $responsavel->telefone = $request->get('telefone');
        $responsavel->email = $request->get('email');
        $responsavel->save();

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
        $responsavel = \App\Responsavel::find($id);
        $responsavel->delete();
        return redirect('responsavel')->with('success', 'Responsavel Deletado');
    }
}
