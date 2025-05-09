<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['usuario'])){
        die("Você não está Logado. <p><a href='login/login.html'>Clique aqui Para Logar</a></p>");
    }
?>