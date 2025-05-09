<?php
    include 'funcoes.php';

    if(!isset($_SESSION['usuario'])){
        session_start();
    }

    $_SESSION['lista_de_compras'] = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizão da Compra</title>
    <style>
        *{
            margin: 0 0;
            padding: 0 0;
        }
        
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
            background-color: #ccc;
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Compra Finalizada!!!</h3><br>
        <a href="main.php"> Clique aqui para Voltar</a>
    </div>
</body>
</html>