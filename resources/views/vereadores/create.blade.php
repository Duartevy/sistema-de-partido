@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Cadastrar Vereador</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vereadores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Vereador</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="partido_id" class="form-label">Partido</label>
            <select name="partido_id" id="partido_id" class="form-select" required>
                <option value="">Selecione um partido</option>
                @foreach ($partidos as $partido)
                    <option value="{{ $partido->id }}">{{ $partido->sigla }} - {{ $partido->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem do Vereador (opcional)</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('vereadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
