<?php

/**
 * Description of Sessao.php
 *   Esta classe controla o uso da super global $_SESSION[] para permitir
 *   o compartilhamento de informações entre as classes. Essas informações
 *   podem ser mensagens ou erros colocadas pelo Controller e  que devem ser emitidas 
 *   pela view; dados de formulários que devem ser reapresentados por uma view 
 *   quando não foram validados, etc. Isso evita ter que dar um start_session() em
 *   cada classe que for utilizar a super global $_SESSION[]
 *   Note que os metodos desta classe são todos STATIC, não necessitando de instanciar
 *   um objeto para utilizá-los. Basta usar o operador :: 
 */

namespace App\Lib;

class Sessao
{
    public static function gravaMensagem($mensagem){
        $_SESSION['mensagem'] = $mensagem;
    }

    public static function limpaMensagem(){
        unset($_SESSION['mensagem']);
    }

    public static function retornaMensagem(){
        return (isset($_SESSION['mensagem'])) ? $_SESSION['mensagem'] : "";
    }

    public static function gravaFormulario($form){
        $_SESSION['form'] = $form;
    }

    public static function limpaFormulario(){
        unset($_SESSION['form']);
    }

    public static function retornaValorFormulario($key){
        return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
    }

    public static function existeFormulario(){
        return (isset($_SESSION['form'])) ? $_SESSION['form'] : "";
    }

    public static function gravaErro($key,$msg) {
      $_SESSION['erro'][$key] = $msg; 
    }
    
    public static function retornaErro($key) {
      return (isset($_SESSION['erro'][$key])) ? $_SESSION['erro'][$key] : "";
    }


    public static function limpaErro(){
        unset($_SESSION['erro']);
    }

}

