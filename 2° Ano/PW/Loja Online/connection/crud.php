<?php
    $con = mysqli_connect("127.0.0.1","root","","ecommerce","3306");

    if(mysqli_connect_errno()){
        echo "Erro ao conectar no Banco de Dados ". mysqli_connect_error();
        exit();
    }else{
        // echo "Conexão realizada com Sucesso!";
        // $select = "SELECT * FROM ecommerce.usuario";
        // $resposta = mysqli_query($con, $select);
        // if(mysqli_num_rows($resposta)){
        //     $row = mysqli_fetch_assoc($resposta);
        //     print($row);
        // }
        // $select = "INSERT INTO ecommerce.usuario(login) values ('teste')";
        // $resposta = mysqli_query($con, $select);
    }
    
?>