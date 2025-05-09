<?php
    session_start();
    include '../crud.php';
    include '../funcoes.php';

    $login = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = mask($_POST["cpf"], '###.###.###-##');
    $telefone = telefone($_POST['telefone']);
    $id = $_SESSION['usuario'];

    if((isset($login)) && (isset($senha)) && (isset($nome)) && (isset($sobrenome)) && (isset($cpf)) && (isset($telefone))){
        if((!empty($login)) && (!empty($senha)) && (!empty($nome)) && (!empty($sobrenome)) && (!empty($cpf)) && (!empty($telefone))){
            $select = "UPDATE ecommerce.usuario SET login=('$login'),
            senha=('$senha'),nome=('$nome'),sobrenome=('$sobrenome'),cpf=('$cpf'),telefone=('$telefone') 
            WHERE iduser='$id'";
            $resultado = mysqli_query($con, $select);
            header('location:../perfil.php');
        }
    }else{
        echo "<script>alert('Erro ao Editar!')
            window.location.assign('editar.html')</script>";   
    }
?>