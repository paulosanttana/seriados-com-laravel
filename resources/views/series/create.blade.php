@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection
    
@section('conteudo')

{{-- validação do insert (padrão do Laravel) --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas">Nº temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporada">
        </div>
        <div class="col col-2">
            <label for="ep_por_temporada">Ep. por temporadas</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>
    </div> 

    <button class="btn btn-primary mt-2">Adicionar</button>  
    {{-- <button class="btn btn-danger mt-2">Voltar</button>   --}}
</form>
@endsection