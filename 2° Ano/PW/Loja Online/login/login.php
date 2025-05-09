<?php
    include '../connection/crud.php';
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if(isset($login) && isset($senha)){
        if(!empty($login) && !empty($senha)){
            $select = "SELECT * FROM ecommerce.usuario WHERE login='$login' AND senha='$senha'";
            $resposta = mysqli_query($con, $select);

            if(mysqli_num_rows($resposta)==1){
                $row = mysqli_fetch_assoc($resposta);

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['usuario'] = $row['iduser'];
                header('location:../main.php');
            }else{
                echo "<script>alert('Erro ao Conectar! Email ou Senha Invalido!!!')
                window.location.assign('login.html')</script>";
            }
        }
    }
?>