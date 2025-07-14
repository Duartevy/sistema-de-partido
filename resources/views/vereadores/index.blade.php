@extends('layouts.app')

@section('content')
    <div class="main-title">
        <h2>Vereadores Cadastrados</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- Filtros --}}
    <form method="GET" action="{{ route('vereadores.index') }}">
        <div class="row mb-4 search-bar justify-content-center">
            <div class="col-md-3">
                <select class="form-control" name="partido">
                    <option value="">Partido</option>
                    @foreach($partidos as $partido)
                        <option value="{{ $partido->id }}" {{ request('partido') == $partido->id ? 'selected' : '' }}>
                            {{ $partido->sigla }} - {{ $partido->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="{{ request('cidade') }}">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nome ou email" value="{{ request('search') }}">
            </div>
            <div class="col-md-1">
                <button class="btn btn-outline-secondary w-100">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-bordered mb-0">
            <thead>
                <tr class="text-center text-navy">
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Partido</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vereadores as $vereador)
                    <tr>
                        <td>
                            @if($vereador->foto)
                                <img src="{{ asset('storage/' . $vereador->foto) }}" width="50" class="rounded-circle">
                            @else
                                <span class="text-muted">Sem foto</span>
                            @endif
                        </td>
                        <td>{{ $vereador->nome }}</td>
                        <td>{{ $vereador->partido->sigla ?? '-' }} - {{ $vereador->partido->nome ?? 'Sem partido' }}</td>
                        <td class="nowrap-cell">{{ $vereador->cpf }}</td>
                        <td>{{ $vereador->email }}</td>
                        <td class="nowrap-cell">{{ $vereador->telefone }}</td>
                        <td>{{ $vereador->estado }}</td>
                        <td>{{ $vereador->cidade }}</td>
                        <td class="d-flex gap-2 justify-content-center action-buttons">
                            <a href="{{ route('vereadores.edit', $vereador->id) }}" class="btn btn-sm bg-navy text-white">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('vereadores.destroy', $vereador->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash3"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
