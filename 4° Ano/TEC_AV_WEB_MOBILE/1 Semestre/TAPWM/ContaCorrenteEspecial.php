<?php
    class ContaCorrenteEspecial extends ContaCorrente{
      private $limiteCheques;
    
      function emitirCheque($qtde) {
        $this->limiteCheques += $qtde;
      }

      public function sacar($valor) {
        if (($this->saldo-$valor) >= ($this->saldo*(-1))){
          $this->saldo -= $valor;
        }
      } 
    }
?>