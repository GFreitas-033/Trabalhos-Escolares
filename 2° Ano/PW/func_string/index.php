<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codificador</title>
</head>
<body>
    <?php
        $s = $_POST['senha'];
        $i=1;

        if(i=1){
            $s = trim($s);
            $tamanho = strlen($s);

            if($tamanho<8){
                echo "A senha precisa ter mais de 8 caracteres e sem espaços";
            }
        }else{
            if($s==($_POST['senha'])){
                $s = strtoupper($s);    
                $s = strrev($s);
                echo "$s";
                if(strrev($_POST['senha'])!=$s){
                    echo " ERROU A SENHA!!!";
                } 
            }
            i++;
        }  
    ?>

    <form action="#" method="POST" id="form1">
        <label>Senha</label><input type="text" value="" name="senha">
        <input type="submit" value="enviar">
    </form>
</body>
</html>