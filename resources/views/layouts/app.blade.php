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

    <style>
        body {
            background-color: #f2f6fc;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #1f2e47;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .main-title {
            text-align: center;
            margin: 2rem 0 1rem;
        }

        .main-title h2 {
            font-weight: 600;
            color: #1f2e47;
        }

        .btn-primary, .btn-success {
            font-weight: 500;
        }

        .table thead {
            background-color: #284a74;
            color: #fff;
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
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg shadow-sm px-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('partidos.index') }}">Partidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vereadores.index') }}">Vereadores</a>
                    </li>
                </ul>
                <a href="{{ route('vereadores.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> Vereadores
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
