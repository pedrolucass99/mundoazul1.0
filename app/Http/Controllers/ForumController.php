<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Profissional;
use Responsavel;
use Instituicao;
use Auth;
use DB;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $forum = \App\Forum::all();

         if(Auth::user()->tipo == 3){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            return view('forum/index', compact('forum', 'instituicao'));
        }

        else if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('forum/index', compact('forum', 'responsavel'));
        }

        else if(Auth::user()->tipo == 2){
            $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
            $profissional = \App\Profissional::find($object->id);
            return view('forum/index', compact('forum', 'profissional'));
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
        $forum = new \App\Forum;
        $forum->id_user = Auth::id();
        $forum->nome_user = Auth::user()->name;
        $forum->publicacao = $request->get('publicacao');
        $forum->save();

        return redirect('forum');
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
        //$object = DB::table('forums')->where('id', $id)->first();
        $forum = \App\Forum::find($id);

        if(Auth::user()->tipo == 3){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            return view('forum/edit', compact('instituicao' ,'forum', 'id'));
        }

        else if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            return view('forum/edit', compact('responsavel' ,'forum', 'id'));
        }

        if(Auth::user()->tipo == 2){
             $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
             $profissional = \App\Profissional::find($object->id);
             return view('forum/edit', compact('profissional', 'forum', 'id'));
        }

        //return view('forum/edit', compact('forum', 'id'));
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
        $forum = \App\Forum::find($id);

        $forum->publicacao = $request->get('publicacao');
        $forum->save();

        return redirect('forum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum = \App\Forum::find($id);
        $forum->delete();
        return redirect('forum');
    }
}
