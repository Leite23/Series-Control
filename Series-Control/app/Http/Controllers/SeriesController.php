<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index', compact('series'))->with('mensagemSucesso', $mensagemSucesso) ;
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso' , 'Serie adicionada com sucesso');

        return to_route('series.index');
    }
    public function destroy(Request $request)
    {
        Serie::destroy($request->series);
        $request->session()->flash('mensagem.sucesso', "Série removida com sucesso");

        return to_route('series.index');
    }
}
