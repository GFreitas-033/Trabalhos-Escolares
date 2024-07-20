<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $idade = 0;
    $anoa = (int) date("Y");
    $diaa = (int) date("d");
    $mesa = (int) date("m");
    if(isset($_POST['dia']) && isset($_POST['mes']) && isset($_POST['ano'])){
        $dia = (int) $_POST['dia'];
        $mes = (int) $_POST['mes'];
        $ano = (int) $_POST['ano'];

        if((empty($dia)) || (empty($mes)) || (empty($ano))){
            
        }else{
            if($mesa>$mes){
                $idade =   $anoa-$ano;
                echo "A sua idade é:".$idade;
            }else if($mesa==$mes){
                if($diaa>=$dia){
                    $idade =   $anoa-$ano;
                    echo "A sua idade é:".$idade;
                }else if($diaa < $dia){
                    $idade =   ($anoa-$ano)-1;
                    echo "A sua idade é:".$idade;
                }
            }else if($mesa<$mes){
                $idade =   ($anoa-$ano)-1;
                echo "A sua idade é:".$idade;
            }
        }
    }
    ?>

    <form action="#" method="POST" id="form1">
    <label>Dia</label><input type="text" value="" name="dia">
    <label>Mês</label><input type="text" value="" name="mes">
    <label>Ano de Nascimento</label><input type="next" value="" name="ano">
    <input type="submit" value="enviar">
</body>
</html>