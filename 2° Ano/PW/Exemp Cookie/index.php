<?php
    $cookie_nome = "user";
    $cookie_valor = "John Doe";
    setcookie($cookie_nome, $cookie_valor, time() + (86400 * 30), "/");
?>
<html>
    <body>
        <?php
            if(!isset($_COOKIE[$cookie_nome])){
                echo "Cookie nomeado '".$cookie_nome."' não está definido!";
            }else{
                echo "Cookie '".$cookie_nome."' está definido!<br>";
                echo "Valor é: ".$_COOKIE[$cookie_nome];
            }
        ?>
    </body>
</html>