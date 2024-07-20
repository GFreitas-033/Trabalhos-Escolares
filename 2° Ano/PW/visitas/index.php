<?php
    if(!isset($_COOKIE["visitas"])){
        echo "Seja Bem-Vindo no Site";
        setcookie("visitas", 1);
    }else{
        echo "Você já visitou esse site: ".$_COOKIE["visitas"]." vezes";
        $i = $_COOKIE["visitas"];
        $i++;
        setcookie("visitas", $i);
    }
?>