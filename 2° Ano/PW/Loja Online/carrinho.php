<?php
    session_start();
    include 'zproteger.php';
    include 'header.html';
    include 'funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Express</title>
    <style>
        .cont a{
            background-color: #a10b0b;
            text-align: center;
        }

        label{
            color: black;
        }

        .cont{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 98.7vw;
            height: 90vh;
            background-color: #ccc;
        }

        .informacoes{
            display: grid;
            grid-template-columns: auto;
            border-radius: 0.5rem;
            padding: 2rem;
            background-color: #d30a0a;
            color: white;
        }

        .erro{
            text-align: center;
            font-family: Poppins;
            padding: 10rem;
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="cont">
            <div class="informacoes">
                <?php
                    exibirLista($_SESSION['lista_de_compras']);
                ?>
            </div>
        </div>
    </form>
</body>
</html>
<?php
    include 'footer.html';    
?>