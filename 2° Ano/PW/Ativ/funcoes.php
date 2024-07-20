<?php
    function adicionarProduto(&$l, $p){
        array_push($l, $p);
        return $l;
    }

    function removerProduto(&$l, $p){
        array_pop($l);
        return $l;
    }

    function ordenarLista(&$l){
        sort($l);
        return $l;
    }

    function exibirLista(&$l){
        foreach($l as $v){
            echo $v."<br>";
        }
    }
?>