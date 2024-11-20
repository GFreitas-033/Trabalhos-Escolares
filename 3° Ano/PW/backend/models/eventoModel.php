<?php
    include '../connection/conn.php';

    if($_POST['operacao']=='create'){
        if(empty($_POST['titulo']) || empty($_POST['data']) || empty($_POST['local']) || empty($_POST['horario']) || empty($_POST['resumo']) || empty($_POST['corpo']) || empty($_POST['autor_id'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "INSERT INTO EVENTO(TITULO,DATA,LOCAL,HORARIO,RESUMO,CORPO,AUTOR_ID) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['titulo'],
                    $_POST['data'],
                    $_POST['local'],
                    $_POST['horario'],
                    $_POST['resumo'],
                    $_POST['corpo'],
                    $_POST['autor_id']
                ]);
                $dados = array(
                    'type' => 'success',
                    'message' => 'Registro salvo com Sucesso!'
                );
            }catch(PDOException $e){
                $dados = array(
                    'type' => 'error',
                    'message' => 'Ocorreu um Erro. '.$e->getMessage()
                );
            }
        }
    }

    if($_POST['operacao']=='read'){
        $sql = "SELECT * FROM EVENTO";
        $resultado = $pdo->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map(null, $row);
        }
    }

    if($_POST['operacao']=='update'){
        if(empty($_POST['titulo']) || empty($_POST['data']) || empty($_POST['local']) || empty($_POST['horario']) || empty($_POST['resumo']) || empty($_POST['corpo']) || empty($_POST['id']) || empty($_POST['autor_id'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "UPDATE EVENTO SET TITULO=?, DATA=?, LOCAL=?, HORARIO=?, RESUMO=?, CORPO=?, AUTOR_ID=? WHERE ID =?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['titulo'],
                    $_POST['data'],
                    $_POST['local'],
                    $_POST['horario'],
                    $_POST['resumo'],
                    $_POST['corpo'],
                    $_POST['id'],
                    $_POST['autor_id']
                ]);
                $dados = array(
                    'type' => 'success',
                    'message' => 'Registro Alterado com Sucesso!'
                );
            }catch(PDOException $e){
                $dados = array(
                    'type' => 'error',
                    'message' => 'Ocorreu um Erro. '.$e->getMessage()
                );
            }
        }
    }

    if($_POST['operacao']=='delete'){
        try{
            $sql = "DELETE FROM EVENTO WHERE ID = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['id']
            ]);
            
            $dados = array(
                'type' => 'success',
                'message' => 'Registro Deletado com Sucesso!'
            );
        }catch(PDOException $e){
            $dados = array(
                'type' => 'error',
                'message' => 'Ocorreu um Erro. '.$e->getMessage()
            );
        }
    }

    if($_POST['operacao']=='view'){
        $sql = "SELECT * FROM EVENTO WHERE ID = ".$_POST['ID']."";
        $resultado = $pdo->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map(null, $row);
        }
    }

    echo json_encode($dados);
?>