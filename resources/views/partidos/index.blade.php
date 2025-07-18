@extends('layouts.app')

@section('content')


    {{-- Título centralizado com seta --}}
        <div class="text-center my-5">
            <h2 class="fw-bold" style="color: #000277;">Partidos Cadastrados</h2>
            <i class="bi bi-chevron-down fs-4" style="color: #000277;"></i>
        </div>


    {{-- Mensagens de feedback --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($partidos->isEmpty())
        <div class="alert alert-info text-center">
            Nenhum partido cadastrado ainda.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($partidos as $partido)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        
                    @if($partido->imagem)
                            <img src="{{ asset('storage/' . $partido->imagem) }}" class="card-img-top" alt="Imagem do partido" style="object-fit: contain; height: 150px;">
                    @else
                            <div class="d-flex align-items-center justify-content-center" style="height: 150px; background-color: #f8f9fa;">
                            <span class="text-muted">Sem foto</span>
                        </div>
                    @endif

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $partido->nome }}</h5>
                            <p class="card-text text-muted">{{ $partido->sigla }}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('partidos.edit', $partido->id) }}" class="btn bg-navy text-white btn-sm">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" onsubmit="return confirm('Deseja mesmo excluir este partido?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
