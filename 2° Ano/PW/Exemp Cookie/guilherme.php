<?php
    $cookie_ip = "ip";
    $cookie_ip_valor = $_SERVER["REMOTE_ADDR"];
    setcookie($cookie_ip, $cookie_ip_valor, time() + (86400 * 30), "/");
    $cookie_nav = "navegador";
    $cookie_nav_valor = $_SERVER['HTTP_USER_AGENT']; 
    setcookie($cookie_nav, $cookie_nav_valor, time() + (86400 * 30), "/");
    $cookie_nome = "nome";
    $cookie_nome_valor = $_SERVER['SERVER_NAME'];
    setcookie($cookie_nome, $cookie_nome_valor, time() + (86400 * 30), "/");
?>

<html>
    <body>
        <?php
            if(!isset($_COOKIE[$cookie_ip])){
                echo "Cookie nomeado '".$cookie_ip."' não está definido!<br>";
            }else{
                echo "Cookie '".$cookie_ip."' está definido!<br>";
                echo "Valor é: ".$_COOKIE[$cookie_ip]."<br>";
            }

            if(!isset($_COOKIE[$cookie_nav])){
                echo "Cookie nomeado '".$cookie_nav."' não está definido!<br>";
            }else{
                echo "Cookie '".$cookie_nav."' está definido!<br>";
                echo "Valor é: ".$_COOKIE[$cookie_nav]."<br>";
            }

            if(!isset($_COOKIE[$cookie_nome])){
                echo "Cookie nomeado '".$cookie_nome."' não está definido!<br>";
            }else{
                echo "Cookie '".$cookie_nome."' está definido!<br>";
                echo "Valor é: ".$_COOKIE[$cookie_nome]."<br>";
            }
        ?>
    </body>
</html>