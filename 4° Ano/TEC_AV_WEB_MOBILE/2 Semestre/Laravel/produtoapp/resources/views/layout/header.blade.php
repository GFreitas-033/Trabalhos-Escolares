<!doctype html>
<html lang="pt-br" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD-Produto Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
  </head>
  <body class="d-flex flex-column h-100">
    <header>
    <!-- Fixed navbar -->   
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">CRUD-Produto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produto/listar">Listar Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produto/cadastrar">Cadastrar Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user">Usuários</a>
                    </li>           
                    <li class="nav-item">
                        <a class="nav-link" href="/fornecedor">Fornecedores</a>
                    </li>                             
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" style="margin-right: 40px">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-fill"></i> &nbsp;{{ session('usuario.name')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-rend" >
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="#">Trocar Senha</a>
                        <a class="dropdown-item" href="{{ route('sair')}}">Sair</a>
                    </div>
                    </li>
                </ul> 
            </div>
        </div>
    </nav>
    </header>
