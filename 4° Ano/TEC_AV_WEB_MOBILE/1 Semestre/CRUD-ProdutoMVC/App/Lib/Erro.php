<?php

namespace App\Lib;

use Exception;

class Erro
{
    private $message;
    private $code;

    public function __construct($objetoException = Exception::class)
    {
        $this->code     = $objetoException->getCode();
        $this->message  = $objetoException->getMessage();
    }

    /*
     * Método chamado dentro da view para exibir a mensagem de erro
     * A variável $errorMessage será utilizada no código da view, pois 
     * este método é chamado via include na view
     */
    public function render()
    {
        $errorMessage = $this->message;

        if(file_exists(PATH . "/App/Views/error/".$this->code.".php")){
            require_once PATH . "/App/Views/error/".$this->code.".php";
        }else{
            require_once PATH . "/App/Views/error/500.php";
        }
        exit;
    }
}

