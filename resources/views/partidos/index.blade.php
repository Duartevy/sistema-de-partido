@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Partidos Cadastrados</h2>
        <a href="{{ route('partidos.create') }}" class="btn btn-success">+ Novo Partido</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($partidos->isEmpty())
        <div class="alert alert-info">
            Nenhum partido cadastrado ainda.
        </div>
    @else
        <div class="row">
            @foreach($partidos as $partido)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($partido->imagem)
                            <img src="{{ asset('storage/' . $partido->imagem) }}" class="card-img-top" alt="Imagem do partido">
                        @else
                            <img src="https://via.placeholder.com/300x180?text=Sem+Imagem" class="card-img-top" alt="Sem imagem">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $partido->nome }}</h5>
                            <p class="card-text text-muted">{{ $partido->sigla }}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-sm btn-primary">Editar</a>

                            <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" onsubmit="return confirm('Deseja mesmo excluir este partido?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
