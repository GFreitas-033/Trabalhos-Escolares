<?php
    session_start();
    include 'zproteger.php';
    include 'header.html';
    include 'connection/crud.php';

    $id = $_SESSION['usuario'];

    $select = "SELECT nome,sobrenome,login,cpf,telefone FROM ecommerce.usuario WHERE iduser='$id'";
    $resposta = mysqli_query($con, $select);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Express Perfil</title>
    <style>
        .cont{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 98.7vw;
            height: 90vh;
            background-color: #ccc;
        }

        .img{
            width: 5rem;
            height: 5rem;
        }

        .editar{
            border-radius: 0.5rem;
            padding: 0.4rem;
            text-align: center;
            background-color: black;
            color: #d30a0a;
        }
        .editar:hover{
            background-color: #1f1e1e;
        }

        @media screen and (min-width: 320px){
            .informacoes{
                display: grid;
                grid-template-columns: auto;
                grid-template-rows: auto auto auto;
                border-radius: 1rem;
                background-color: #d30a0a;
            }
        }

        @media screen and (min-width: 720px){
            .informacoes{
                display: grid;
                grid-template-columns: auto auto;
                grid-template-rows: auto auto auto;
                border-radius: 1rem;
                background-color: #d30a0a;
            }
        }
    </style>
</head>
<body>
    <div class="cont">
        <div class="informacoes">
            <img src="img/perfil.jpg" class="img">
            <?php
                if(mysqli_num_rows($resposta)){
                    $row = mysqli_fetch_assoc($resposta);
                    foreach($row as $v){
                        echo "".$v."<br>";
                    }
                }
            ?>
            <a href="delete.php" class="editar">Deletar Conta</a>
            <a href="editar/editar.html" class="editar">Editar Dados</a>
            <a href="zsair.php">Sair</a>        
        </div>
    </div>
</body>
</html>

<?php
    include 'footer.html';
?>