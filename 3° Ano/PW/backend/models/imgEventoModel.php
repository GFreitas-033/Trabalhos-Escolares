<?php
    include '../connection/conn.php';

    if($_POST['operacao']=='create'){
        if(empty($_POST['nome']) || empty($_POST['evento_id'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "INSERT INTO IMG_EVENTO(NOME, EVENTO_ID) VALUES (?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['nome'],
                    $_POST['evento_id']
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
        $sql = "SELECT * FROM IMG_EVENTO";
        $resultado = $pdo->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map(null, $row);
        }
    }

    if($_POST['operacao']=='update'){
        if(empty($_POST['nome']) || empty($_POST['evento_id'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "UPDATE IMG_EVENTO SET NOME=?, EVENTO_ID=? WHERE ID =?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['nome'],
                    $_POST['id'],
                    $_POST['evento_id']
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
            $sql = "DELETE FROM IMG_EVENTO WHERE ID = ?";
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

    echo json_encode($dados);
?>