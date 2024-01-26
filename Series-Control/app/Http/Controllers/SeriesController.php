<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Series;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Http\Controllers\Season;
use App\Http\Controllers\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index', compact('series'))->with('mensagemSucesso', $mensagemSucesso);
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());
        $seasons = [];

        for ($i = 1; $i <= $request->input('seasonsQty'); $i++) {
            $season[] = [
                'series_id' => $serie->id,
                'numero' => $i,
            ];
        }

        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'numero' => $j
                ];
            }
        }

        Episode::insert($episodes);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }
    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }
    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }
    public function update(Request $request, Serie $series)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
