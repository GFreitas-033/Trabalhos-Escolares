<!DOCTYPE html>
<html lang="pt-br" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://<?php echo APP_HOST; ?>/public/css/bootstrap.min.css">
    <!-- Css para o navbar -->
    <link href="http://<?php echo APP_HOST; ?>/public/css/navbar.css" rel="stylesheet"> 
    <!-- Biblioteca de icones fontawesome-->
    <link href="http://<?php echo APP_HOST; ?>/public/fontawesome/css/all.css" rel="stylesheet"> 
    <title><?php echo TITLE; ?></title> 
  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">CRUD-ProdutoMVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($viewVar['nameController'] == "HomeController") { ?> active <?php } ?>">
              <a class="nav-link" href="http://<?php echo APP_HOST; ?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if(($viewVar['nameController'] == "ProdutoController") AND ($viewVar['nameAction'] == "listar")){ ?> active <?php } ?>">
              <a class="nav-link" href="http://<?php echo APP_HOST."/produto/listar"; ?>">Listar Produtos</a>
            </li>
            <li class="nav-item <?php if(($viewVar['nameController'] == "ProdutoController") AND ($viewVar['nameAction'] == "cadastrar")){ ?> active <?php } ?>">
                <a class="nav-link" href="http://<?php echo APP_HOST."/produto/cadastrar"; ?>">Cadastrar Produtos</a>
            </li>
            <li class="nav-item <?php if(($viewVar['nameController'] == "UsuarioController") AND ($viewVar['nameAction'] == "listar")) { ?> active <?php } ?>">
                <a class="nav-link" href="http://<?php echo APP_HOST."/usuarios/listar"; ?>">Listar Usuários</a>
            </li>
            <li class="nav-item <?php if(($viewVar['nameController'] == "UsuariosController") AND ($viewVar['nameAction'] == "cadastrar")){ ?> active <?php } ?>">
                <a class="nav-link" href="http://<?php echo APP_HOST."/usuarios/cadastrar"; ?>">Cadastrar Usuários</a>
            </li>
          </ul>

          <ul class="navbar-nav" style="margin-right: 0px">
            <li class="nav-item dropdown" style="margin-right: 0px">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
              <i class="fas fa-user"> </i> &nbsp;<span class="d-sm-inline">Username</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Trocar Senha</a>
                <a class="dropdown-item" href="#">Sair</a>
              </div>
            </li>
          </ul>   
        </div>                
      </nav>
    </header>  

