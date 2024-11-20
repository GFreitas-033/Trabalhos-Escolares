<?php
    include '../connection/conn.php';

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s', time());

    if($_POST['operacao']=='create'){
        if(empty($_POST['titulo']) || empty($_POST['resumo']) || empty($_POST['corpo'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "INSERT INTO NOTICIA(TITULO, RESUMO, CORPO, DATA) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['titulo'],
                    $_POST['resumo'],
                    $_POST['corpo'],
                    $data
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
        $sql = "SELECT * FROM NOTICIA";
        $resultado = $pdo->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map(null, $row);
        }
    }

    if($_POST['operacao']=='update'){
        if(empty($_POST['titulo']) || empty($_POST['resumo']) || empty($_POST['corpo']) || empty($_POST['id'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "UPDATE NOTICIA SET TITULO=?, RESUMO=?, CORPO=?, DATA=? WHERE ID =?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['titulo'],
                    $_POST['resumo'],
                    $_POST['corpo'],
                    $data,
                    $_POST['id']
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
            $sql = "DELETE FROM NOTICIA WHERE ID = ?";
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