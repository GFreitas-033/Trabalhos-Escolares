<?php
  abstract class Conta {
    private $agencia;
    private $conta;
    protected $saldo;

    function getAgencia() {
      return $this->agencia;
    }
  
    function getConta() {
      return $this->conta;
    }
  
    function getSaldo() {
      return $this->saldo;
    }
  
    function setAgencia($agencia){
      $this->agencia = $agencia;
    }
  
    function setConta($conta){
      $this->conta = $conta;
    }
  
    function setSaldo($saldo){
      $this->saldo = $saldo;
    }
  
    public function depositar($valor){
      $this->saldo += $valor;
    }

    public function sacar($valor) {
      if ($this->saldo>=$valor){
        $this->saldo -= $valor;
      }
    }

    public function saldo() {
      return $this->saldo;
    }
  }
?>