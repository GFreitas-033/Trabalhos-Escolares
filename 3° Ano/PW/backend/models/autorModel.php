<?php
    include '../connection/conn.php';
    
    if($_POST['operacao']=='create'){
        if(empty($_POST['nome']) || empty($_POST['login']) || empty($_POST['senha'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "INSERT INTO AUTOR(NOME, LOGIN, SENHA) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['nome'],
                    $_POST['login'],
                    $_POST['senha']
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
        $sql = "SELECT * FROM AUTOR";
        $resultado = $pdo->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map(null, $row);
        }
    }

    if($_POST['operacao']=='update'){
        if(empty($_POST['nome']) || empty($_POST['login']) || empty($_POST['senha']) || empty($_POST['id'])){
            $dados = array(
                'type' => 'error',
                'message' => 'Existe(m) campo(s) obrigatorio(s) não preenchido(s).'
            );
        }else{
            try{
                $sql = "UPDATE AUTOR SET NOME=?, LOGIN=?, SENHA=? WHERE ID =?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['nome'],
                    $_POST['login'],
                    $_POST['senha'],
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
            $sql = "DELETE FROM AUTOR WHERE ID = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['ID']
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
        $sql = "SELECT * FROM AUTOR WHERE ID = ".$_POST['ID']."";
        $resultado = $pdo->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map(null, $row);
        }
    }

    if($_POST['operacao']=='login'){
        try{
            $login = isset($_POST['LOGIN']) ? addslashes(trim($_POST['LOGIN'])) : false;
            $senha = isset($_POST['SENHA']) ? $_POST['SENHA'] : false;
            if(empty($login) || empty($senha)){
                $dados = array(
                    'type' => 'error',
                    'message' => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
                );
            }
            $sql = $pdo->prepare("SELECT * FROM AUTOR WHERE LOGIN = '".
                $_POST['LOGIN']."'AND SENHA = '".$_POST['SENHA']."'");
            $sql->execute();
            $total = $sql->rowCount();
            if($total===1){
                $linha = $sql->fetch();
                session_start();
                $_SESSION['LOGIN'] = $linha['LOGIN'];
                $_SESSION['NOME'] = $linha['NOME'];
                $_SESSION['IDAUTOR'] = $linhs['ID'];
                $dados = array(
                    'type' => 'success',
                    'message' => 'Seja bem vindo '.$_SESSION['NOME']
                );
            }else{
                $dados = array(
                    'type' => 'error',
                    'message' => 'Usuário e/ou senha incorreta(s)!'
                );
            }
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    if($_POST['operacao'] == 'validate'){

    }

    if($_POST['operacao'] == 'logout'){
        session_start();
        session_destroy();
        $dados = array(
            'type' => 'success',
            'message' => 'Logout efetuado com sucesso!'
        );
    }

    echo json_encode($dados);
?>