@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    {{-- foreach utilizando o atalho do blade '@' --}}
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

        <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
            <input type="text" class="form-control" value="{{ $serie->nome }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                    <i class="fas fa-check"></i>
                </button>
                {{-- @csrf --}}
                {{ csrf_field() }}   {{-- token p/ segurança da requisição --}}
            </div>
        </div>
        
        <span class="d-flex">
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                <i class="fas fa-edit"></i>
            </button>
            <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm  mr-2">
                <i class="fas fa-external-link-alt"></i>
            </a>
            <form action="/series/{{ $serie->id }}" method="post" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')">
                {{ csrf_field() }}  {{-- token p/ segurança da requisição --}}
                {{ method_field('DELETE') }}  {{-- token p/ segurança da requisição. utilizado DELETE na rota --}}
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </span> 
    </li>
    @endforeach
</ul>

<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    function editarSerie(serieId){
        let formData = new FormData();
        const nome = document
            .querySelector(`#input-nome-serie-${serieId} > input`)
            .value;
        const token = document.querySelector('input[name="_token"]').value;
        formData.append('nome', nome);
        formData.append('_token', token);

        // enviar para uma rota do laravel
        const url = `/series/${serieId}/editaNome`;
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });

    }
</script> 
@endsection