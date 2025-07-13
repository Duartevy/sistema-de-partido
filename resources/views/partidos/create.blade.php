@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Cadastrar Novo Partido</h2>

    {{-- Exibir erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erros encontrados:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('partidos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Sigla --}}
        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla <span class="text-danger">*</span></label>
            <input type="text" name="sigla" id="sigla" class="form-control" value="{{ old('sigla') }}" required>
        </div>

        {{-- Nome --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome completo <span class="text-danger">*</span></label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        {{-- Imagem --}}
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem do Partido (opcional)</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('partidos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
