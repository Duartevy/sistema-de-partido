@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Vereador</h2>

    <form action="{{ route('vereadores.update', $vereador->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $vereador->nome) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $vereador->cpf) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $vereador->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $vereador->telefone) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado (UF):</label>
            <input type="text" name="estado" id="estado" value="{{ old('estado', $vereador->estado) }}" class="form-control" maxlength="2" required>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" name="cidade" id="cidade" value="{{ old('cidade', $vereador->cidade) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="partido_id" class="form-label">Partido:</label>
            <select name="partido_id" id="partido_id" class="form-select" required>
                <option value="">-- Selecione --</option>
                @foreach($partidos as $partido)
                    <option value="{{ $partido->id }}" {{ $vereador->partido_id == $partido->id ? 'selected' : '' }}>
                        {{ $partido->sigla }} - {{ $partido->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            @if($vereador->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $vereador->foto) }}" alt="Foto atual" width="100">
                </div>
            @endif
            <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('vereadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
