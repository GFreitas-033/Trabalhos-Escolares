<?php
    $hostname = "localhost";
    $dbname = "jornal";
    $username = "root";
    $password = "";

    try{
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname,$username,$password);
            $return = array(
                'type'=>'success',
                'Mensagem'=>'Conexão efetuada com sucesso!'
            );
    } catch(PDOException $e){
        $return = array(
            'type'=>'error',
            'Mensagem'=>'Erro: '.$e->getMessage()
        );
    }

?>