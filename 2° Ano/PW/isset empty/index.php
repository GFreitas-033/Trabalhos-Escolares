<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['login']) && isset($_POST['senha'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if((empty($login)) || (empty($senha))){
            echo "Alguma coisa tá errada,Arruma aí!!!"; 
        }else if(($login=="adm123") && ($senha=="12345678")){
            header('location:index2.php');
        }else{
            header('location:erro.php');
        }
    }
    ?>

    <form action="#" method="POST" id="form1">
    <label>Login</label><input type="text" value="" name="login">
    <label>Senha</label><input type="password" value="" name="senha">
    <input type="submit" value="enviar">
</body>
</html>