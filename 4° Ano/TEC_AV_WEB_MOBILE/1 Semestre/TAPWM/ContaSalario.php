<?php
    class ContaSalario extends Conta{
    
      function lancarPgto($valor) {
        $novoSaldo = $this->getSaldo()+ $valor;
        $this->setSaldo($novoSaldo);
      }

      function depositar($valor){
        echo "Esse Tipo de Conta NÃO aceita depósitos!";
      }    
    }
?>