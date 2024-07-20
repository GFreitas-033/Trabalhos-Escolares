<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
</head>
<body>
    <?php
        include 'funcoes.php';

        session_start();

        if(isset($_POST['adi'])){
            $_SESSION[''] = adicionarProduto($_SESSION[''], $_POST['en']);
        }else if(isset($_POST['exc'])){
            $_SESSION[''] = removerProduto($_SESSION[''], $_POST['en']);
        }

        $_SESSION = ordenarLista($_SESSION);
        exibirLista($_SESSION);
    ?>

    <form action="#" method="post" id="form1">
        <label>Produto:</label><input type="text" name="en" id="en"><br>
        <input type="submit" name="adi" value="Adicionar">
        <input type="submit" name="exc" value="Deletar">
    </form>
</body>
</html>