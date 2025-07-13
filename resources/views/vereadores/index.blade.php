@extends('layouts.app')

@section('content')
    <div class="main-title">
        <h2>Vereadores Cadastrados</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- Filtros --}}
    <div class="row mb-4 search-bar justify-content-center">
        <div class="col-md-3">
            <select class="form-control" name="partido">
                <option>Partido</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Cidade">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <div class="col-md-1">
            <button class="btn btn-outline-secondary w-100"><i class="bi bi-search"></i></button>
        </div>
    </div>

    <div class="table-responsive shadow-sm bg-white rounded">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Partido</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th class="text-center">Ações</th>
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
                        <td>{{ $vereador->cpf }}</td>
                        <td>{{ $vereador->email }}</td>
                        <td>{{ $vereador->telefone }}</td>
                        <td>{{ $vereador->estado }}</td>
                        <td>{{ $vereador->cidade }}</td>
                        <td class="d-flex gap-2 justify-content-center action-buttons">
                            <a href="{{ route('vereadores.edit', $vereador->id) }}" class="btn btn-sm btn-primary">
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
