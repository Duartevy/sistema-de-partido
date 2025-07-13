@extends('layouts.app') 

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Vereadores Cadastrados</h2>
        <a href="{{ route('vereadores.create') }}" class="btn btn-success">+ Novo Vereador</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($vereadores->isEmpty())
        <div class="alert alert-info">Nenhum vereador cadastrado.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
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
                                    <img src="{{ asset('storage/' . $vereador->foto) }}" alt="Foto" width="60" class="rounded shadow-sm">
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
                            <td class="d-flex gap-2">
                                <a href="{{ route('vereadores.edit', $vereador->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('vereadores.destroy', $vereador->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este vereador?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
