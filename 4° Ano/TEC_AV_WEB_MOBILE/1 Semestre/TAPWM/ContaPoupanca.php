<?php
    class ContaPoupanca extends Conta{
    
      function lancarJuros($taxajuros) {
        $novoSaldo = $this->getSaldo()+ $this->getSaldo()*$taxajuros;
        $this->setSaldo($novoSaldo);
      }
    }
?>