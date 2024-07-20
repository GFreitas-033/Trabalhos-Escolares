<?php
    if(isset($_POST['login']) && isset($_POST['senha'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if(!empty($login) && !empty($senha)){
            if(($login=="cliente123") && ($senha=="1234")){
                header('location:main.php');
                session_start();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Express</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap');
        *{
            margin: 0;
            padding: 0; 
        }

        body{
            background-image: linear-gradient(to right, red, orange, yellow);
            font-family: Poppins;
        }

        .label{
            font-size: 1.5rem; 
        }

        .container{
            display: block;
            background-color: #ccc;
            height: 18rem;
            width: 18rem;
            border-radius: 3rem;
            text-align: center;
        }

        #form1{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #btn{
            font-size: 1.3rem;
            color: white;
            background-color: black;
            margin: 2rem;
            padding: 0.6rem;
            border-radius: 1rem;
        }

        #btn:hover{
            color: black;
            background-color: white;
        }

        #login, #senha{
            width: 70%;
            height: 1.6rem;
            font-size: 1rem;
            margin-top: 0.8rem;
        }
    </style>
</head>
<body>  
    <form action="#" method="post" id="form1">
        <div class="container">
            <label class="label">Login:</label><br><input type="text" name="login" id="login"><br>
            <label class="label">Senha:</label><br><input type="password" name="senha" id="senha"><br>
            <input type="submit" value="Entrar" id="btn">
        </div>
    </form>
</body>
</html>