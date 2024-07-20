<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Express</title>
    <style>
        .erro{
            text-align: center;
            font-family: Poppins;
            padding: 10rem;
            background-color: #ccc;
        }
    </style>

</head>
<body>
    <?php
        include 'header.html';
        include 'funcoes.php';
        
        exibirLista($_SESSION['lista_de_compras']);

        include 'footer.html';    
    ?>
</body>
</html>