<?php
include("conexao.php");

if (isset($_GET['deletar'])) {
    $id = intval($_GET['deletar']);
    $sql_query = $pdo->prepare("SELECT * FROM IMG_NOTICIA WHERE id = :id");
    $sql_query->execute([':id' => $id]);
    $arquivos = $sql_query->fetch(PDO::FETCH_ASSOC);

    if ($arquivos && file_exists($arquivos['path']) && unlink($arquivos['path'])) {
        $deu_certo = $pdo->prepare("DELETE FROM IMG_NOTICIA WHERE id = :id");
        if ($deu_certo->execute([':id' => $id])) {
            echo "Arquivo deletado com sucesso!";
        }
    } else {
        echo "<p>Erro ao deletar arquivo</p>";
    }
}

function enviarArquivo($error, $size, $name, $tmp_name) {
    include("conexao.php");

    if ($error) {
        die("Falha ao enviar arquivo");
    }

    if ($size > 2097152) {
        die("Arquivo muito grande!! Max: 2MB");
    }

    $pasta = "arquivos/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png") {
        die("Tipo de Arquivo não aceito");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    if ($deu_certo) {
        $stmt = $pdo->prepare("INSERT INTO IMG_NOTICIA (NOME, NOTICIA_ID, PATH) VALUES (:nome, :noticia_id, :path)");
        $stmt->execute([':nome' => $nomeDoArquivo, ':noticia_id' => 1, ':path' => $path]);
        return true;
    } else {
        return false;
    }
}

if (isset($_FILES['arquivos'])) {
    $arquivos = $_FILES['arquivos'];
    $tudo_certo = true;
    foreach ($arquivos['name'] as $index => $arq) {
        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index]);
        if (!$deu_certo) {
            $tudo_certo = false;
        }
    }

    if ($tudo_certo) {
        echo "<p>Todos os Arquivos foram enviados com sucesso!</p>";
    } else {
        echo "<p>Falha ao enviar arquivo!</p>";
    }
}

$sql_query = $pdo->query("SELECT * FROM IMG_NOTICIA");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="POST">
        <p>
            <label for="">Selecione o Arquivo</label>
            <input multiple type="file" name="arquivos[]">
        </p>
        <button type="submit" name="upload">Enviar Arquivo</button>
    </form>

    <h1>Lista de Arquivos</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Preview</th>
                <th>Arquivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($arquivos = $sql_query->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><img height="50" src="<?php echo $arquivos['path']; ?>"></td>
                <td><a target="_blank" href="<?php echo $arquivos['path']; ?>"><?php echo $arquivos['NOME']; ?></a></td>
                <td><a href="upload.php?deletar=<?php echo $arquivos['ID']; ?>">Deletar</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>