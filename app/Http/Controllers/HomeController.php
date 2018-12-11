<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Profissional;
use Responsavel;
use Instituicao;
use Auth;
use Evento;
use Projeto_social;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo == 3){
            $object = DB::table('instituicaos')->where('id_user', Auth::id())->first();
            $instituicao = \App\Instituicao::find($object->id);
            $evento = \App\Evento::all();
            $projetos = \App\Projeto_social::all();
            return view('Home/instituicao', compact('instituicao'), compact('projetos'));
        }

        else if(Auth::user()->tipo == 1){
            $object = DB::table('responsavels')->where('id_user', Auth::id())->first();
            $responsavel = \App\Responsavel::find($object->id);
            $evento = \App\Evento::all();
            return view('Home/responsavel', compact('responsavel'), compact('evento'));
        }

        else if(Auth::user()->tipo == 2){
            $object = DB::table('profissionals')->where('id_user', Auth::id())->first();
            $profissional = \App\Profissional::find($object->id);
            $evento = \App\Evento::all();
            return view('Home/profissional', compact('profissional'), compact('evento'));
        }

        else{
            return view('home');
        }

    }
}
