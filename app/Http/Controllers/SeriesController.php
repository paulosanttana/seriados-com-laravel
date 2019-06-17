<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Temporada;
use App\Episodio;
use App\Services\{CriadorDeSerie, RemovedorDeSerie};
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
    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        // cria uma serie apartir do metodo criadorDeSerie da classe CriadorDeSerie.
        $serie = $criadorDeSerie->criarSerie(
            // passando parametros
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} e suas temporadas e episodios criadas com sucesso"
            );

        return redirect()->route('listar_series');
    }

    //DELETE registro do banco sqlite
    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );

        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

}