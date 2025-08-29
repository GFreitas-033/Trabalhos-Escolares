<?php
    class ContaCorrente extends Conta{
      private $qtdeCheques;
    
      function emitirCheque($qtde) {
        $this->qtdeCheques += $qtde;
      }
    }
?>