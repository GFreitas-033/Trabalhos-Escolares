<?php

/**
 * Description of Controller
 *   Esta classe é instanciada no método run() da classe App.php da raiz.
 *   É uma classe abstrata, pois só vai ser usada pelas classes Filhas. 
 *   Todos os Controllers devem herdar (extends) dessa classe
 */

namespace App\Controllers;

use App\Lib\Sessao;

abstract class Controller
{
    protected $app;  //Visível somente nesta classe e nas classes Filhas
    private $viewVar; //Visível somente nesta classe

    
    /*
     * Coloca no vetor Associativo $viewVar dois elementos:
     *  $viewVar['nameController'] -> com o nome do Controlador vindo de App.php
     *  $viewVar['nameAction'] -> com o nome da Action vindo de App.php
     */
    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
        $this->setViewParam('nameAction',$app->getAction());
    }

    /*
     * Monta a Página de saída.
     *  É chamada por algum Controller para exibir dados
     */    
    public function render($view)
    {
        $viewVar   = $this->getViewVar(); //Será usada dentro da view chamada
        $Sessao    = Sessao::class; //Atribui para a variável $Sessao o nome completo 
                                    //da classe Sessao, que é App\Lib\Sessao pois estou 
                                    //usando namespace. Esta variavel será utilizada nas 
                                    //views que serão chamadas

       require_once PATH . '/App/Views/layouts/header.php'; //Carrega nosso Menu
       require_once PATH . '/App/Views/' . $view . '.php'; //Monta a parte do meio da página
       require_once PATH . '/App/Views/layouts/footer.php'; //Carrega nosso rodapé
    }

    /*
     * Redireciona para uma view quando acontece algum erro, por exemplo
     *  em um formulário NÃO validado e precisa reapresentar o formulário
     *  com os dados já digitados, ou apresentar uma outra view para finalizar. 
     */    
    public function redirect($view)
    {
        header('Location: http://' . APP_HOST . $view);
        exit;
    }

    //Retorna o vetor associativo $viewVar com os elementos nameController e nameAction 
    public function getViewVar()
    {
        return $this->viewVar;
    }

    //Monta um elemento do array associativo viewVar que será usado nas views
    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }
}

