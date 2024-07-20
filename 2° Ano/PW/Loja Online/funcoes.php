<?php
    function adicionarProduto(&$l, $p){
        if (!is_array($l)) {
            $l = [];
        }
        array_push($l, $p);
        return $l;
    }

    function removerProduto(&$l, $p){
        if(is_array($l)){
            array_pop($l);
            return $l;
        }
    }

    function exibirLista(&$l){
        if(!empty($l)){
            foreach($l as $v){
                echo $v."<br>";
            }
            echo '<label>Deletar o último Produto</label><input type="submit" name="Deletar" value="Deletar">';
            if(isset($_POST['Deletar'])){
                $_SESSION['lista_de_compras'] = removerProduto($_SESSION['lista_de_compras'], $l);
            }
        }else{
            echo '<div class="erro"><h1>Você ainda não tem nenhum item em seu Carrinho</h1></div>';
        }
    }
?>