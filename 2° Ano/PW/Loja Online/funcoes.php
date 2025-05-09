<?php
    function adicionarProduto(&$l, $p){
        if (!is_array($l)) {
            $l = [];
        }
        array_push($l, $p);
        return $l;
    }

    function removerProduto(&$l){
        if(is_array($l)){
            array_pop($l);
            return $l;
        }
    }

    function exibirLista(&$l){
        if(isset($_POST['Deletar'])){
            $_SESSION['lista_de_compras'] = removerProduto($_SESSION['lista_de_compras']);
            $_SESSION['total'] = removerProduto($_SESSION['total']);
        }

        if(!empty($l)){
            foreach($l as $v){
                echo $v."<br>";
            }
            
            echo '<form action="" method="post"><label><b>Deletar Ultimo Produto</b></label>
            <input type="submit" name="Deletar" value="Deletar"></form>';

            $total = array_sum($_SESSION['total']);
            echo "Total: R$".$total;

            echo "<br><a href='finalizar.php'>Finalizar Compra</a>";
        }else{
            echo '<div class="erro"><h1>Você ainda não tem nenhum item em seu Carrinho</h1></div>';
        }
    }
    
    function mask($val, $mask) {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k])) $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i])) $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    
    function telefone($tel){
        $tel="(".substr($tel,0,2).")".substr($tel,2,-4)."-".substr($tel,-4);
        return $tel;
    }
?>