<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Partidos Políticos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Ícones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Seu CSS compilado com Laravel Mix -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f2f6fc;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #C0C0C0 !important;
        }

        .main-title {
            text-align: center;
            margin: 2rem 0 1rem;
        }

        .main-title h2 {
            font-weight: 600;
            color: #000277;
        }

        .btn i {
            margin-right: 4px;
        }

        .search-bar input,
        .search-bar select {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 0.5rem 1rem;
        }

        .search-bar .form-control:focus {
            box-shadow: none;
            border-color: #999;
        }

        .action-buttons .btn {
            min-width: 90px;
        }

        /* Botões azul marinho */
        .bg-navy {
            background-color: #000277 !important;
            color: white !important;
            border: none !important;
        }

        .bg-navy:hover {
            background-color: #000155 !important;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg shadow-sm px-4">
    <div class="container-fluid">

        {{-- Esquerda: Botões de navegação --}}
        <div class="d-flex gap-2">
            <a href="{{ route('partidos.index') }}" class="btn bg-navy text-white fw-semibold px-4 py-2">Partidos</a>
            <a href="{{ route('vereadores.index') }}" class="btn bg-navy text-white fw-semibold px-4 py-2">Vereadores</a>
        </div>

        {{-- Direita: Botões de ação --}}
        <div class="d-flex gap-2 ms-auto">
            <a href="{{ route('vereadores.create') }}" class="btn bg-navy text-white fw-semibold px-4 py-2">
                <i class="bi bi-plus-lg"></i> Vereador
            </a>
            <a href="{{ route('partidos.create') }}" class="btn bg-navy text-white fw-semibold px-4 py-2">
                <i class="bi bi-plus-lg"></i> Novo Partido
            </a>
        </div>

    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>
