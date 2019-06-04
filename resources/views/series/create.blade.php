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
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome">
    </div>
    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection