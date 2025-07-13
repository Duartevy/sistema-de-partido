@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Partido</h2>

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

    <form action="{{ route('partidos.update', $partido->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Sigla --}}
        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla <span class="text-danger">*</span></label>
            <input type="text" name="sigla" id="sigla" class="form-control" value="{{ old('sigla', $partido->sigla) }}" required>
        </div>

        {{-- Nome --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome completo <span class="text-danger">*</span></label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $partido->nome) }}" required>
        </div>

        {{-- Imagem --}}
        <div class="mb-3">
            <label for="imagem" class="form-label">Nova imagem (opcional)</label>
            <input type="file" name="imagem" id="imagem" class="form-control">

            @if ($partido->imagem)
                <div class="mt-3">
                    <label class="form-label">Imagem atual:</label><br>
                    <img src="{{ asset('storage/' . $partido->imagem) }}" alt="Imagem do partido" width="120" class="rounded shadow-sm border">
                </div>
            @endif
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('partidos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
