<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');
    
        return view('series.index', [
            // declaração de variavel para mostrar na view
            'series' => $series,
            'mensagem' => $mensagem
        ]);
    }

    public function create()
    {
        return view('series.create');
    }

    //INSERT registro do banco sqlite
    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} criada com sucesso {$serie->nome}"
            );

        return redirect()->route('listar_series');
    }

    //DELETE registro do banco sqlite
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série removida com sucesso"
            );

        return redirect()->route('listar_series');
    }

}