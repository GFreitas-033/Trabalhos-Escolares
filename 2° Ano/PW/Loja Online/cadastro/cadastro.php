<?php
    include '../connection/crud.php';
    include '../funcoes.php';

    $login = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = mask($_POST["cpf"], '###.###.###-##');
    $telefone = telefone($_POST['telefone']);
    

    if((mb_strlen($cpf) != 14) || (mb_strlen($telefone) != 14)){
        echo "<script>alert('Erro ao Cadastrar! Em CPF ou em Telefone')
            window.location.assign('cadastro.html')</script>";   
    }else{
        if((isset($login)) && (isset($senha)) && (isset($nome)) && (isset($sobrenome)) && (isset($cpf)) && (isset($telefone))){
            if((!empty($login)) && (!empty($senha)) && (!empty($nome)) && (!empty($sobrenome)) && (!empty($cpf)) && (!empty($telefone))){
                $select = $con -> prepare("INSERT INTO ecommerce.usuario(login,senha,nome,sobrenome,cpf,telefone) 
                values(?, ?, ?, ?, ?, ?)");

                $select -> bind_param("ssssss", $login, $senha, $nome, $sobrenome, $cpf, $telefone);
                if($select->execute()){
                    echo "<script>alert('cadastrado')</script>";
                }
                header('location:../login/login.html');
            }else{
                echo "<script>alert('Erro ao Cadastrar! Alguma Coisa estava Vazia!!!')
                window.location.assign('cadastro.html')</script>";   
            } 
        }else{
            echo "<script>alert('Erro ao Cadastrar!')
            window.location.assign('cadastro.html')</script>";   
        }
    }
    

    
    $select -> close();
?>