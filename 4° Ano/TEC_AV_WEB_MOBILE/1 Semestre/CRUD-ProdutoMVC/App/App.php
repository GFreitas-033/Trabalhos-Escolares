<?php

/**
 * Description of App
 *   Esta classe é instanciada no index.php da raiz. 
 *   O construtor declara várias constantes utilizadas na Aplicação e depois 
 *   chama  o método url(), o qual vai preencher os atributos com os nomes do
 *   Controlador, método(action), params e outros, vindos da URL.
 *   O método run() é chamdo pelo index.php após instanciar a classe, e deve
 *   instanciar o Controlador correto e chamar o método correto.
 */

namespace App;

use App\Controllers\HomeController;
use Exception;

class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public  $controllerName;

    public function __construct()
    {
        /*
         * Constantes da Aplicação
         */
        define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "/CRUD-ProdutoMVC");
        define('PATH'           , realpath('./'));
        define('TITLE'          , "CRUD-Produto em PHP usando MVC e OO");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root"); //Usuário de acesso ao MySQL
        define('DB_PASSWORD'    , "");  //Senha de acesso ao MySQL
        define('DB_NAME'        , "crudproduto");  //Nome do Banco no MySQL
        define('DB_DRIVER'      , "mysql");  //Usado pelo PDO

        $this->url();
    }

    /*
     * run() - Este método é chamado pelo index.php da raiz, após instanciar a classe.
     *   Monta o nome do Controlador e o Método (action) e caso existam, instancia o objeto 
     *   do Controller e executa o método. Se não foi digitado um Controller específico na Url,
     *   chama o HomeController e o método index()
     */   
    public function run()
    {
        if ($this->controller) {
            $this->controllerName = ucwords($this->controller) . 'Controller';
		//Retira espaços, caracteres especiais,dígitos Deixa somente letras Maiúsc. e Minúsc.
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
        } else {
            $this->controllerName = "HomeController";  //Caso não digitou nada chama a Home
        }

        $this->controllerFile   = $this->controllerName . '.php';
        if(isset($this->action)){
            $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);
        }

        if (!$this->controller) {   //Caso não digitou o Controller - chama a Home
            $this->controller = new HomeController($this);
            $this->controller->index();
        }

        //Se a URL amigável contém o Controller e o Action, então carrega-os a partir daqui
        
        //Verifica se o arquivo da classe do Controller existe
        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new Exception("Página não encontrada.", 404);
        }

        //Instancia o Controller
        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);

        if (!class_exists($nomeClasse)) {
            throw new Exception("Erro na aplicação", 500);
        }
        
        //Chama o método relacionado com a Action
        if (isset($this->action) AND method_exists($objetoController, $this->action)) {
            $objetoController->{$this->action}($this->params);
            return;
        } else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        } else {  //ou gera um erro 500 (exception) se não existe o método solicitado
            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);
        }
        
        //Se chegar até aqui é porque não conseguiu carregar nada, então gera um erro 404
        throw new Exception("Página não encontrada.", 404);
    }

    /*url()
     *  Preenche os atributos controller e action com valores vindos da URL amigável
     *    Caso a URL apresente também parâmetros, coloca-os no atributo params.
     * Exemplo de URL http://localhost/CRUD-ProdutoMVC/produto/editar/15
     *   Controller: Produto
     *   Método/action: editar
     *   params: 15 -> Código do produto a ser editado 
     */
    public function url () {

        if ( isset( $_GET['url'] ) ) {

            $path = $_GET['url'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL); 

            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );
            $this->action      = $this->verificaArray( $path, 1 );

            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );
                unset( $path[1] );
                $this->params = array_values( $path );
            }
        }
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getControllerName(){
        return $this->controllerName;
    }

    /*
     * Verifica se o item do array existe e não está vazio. Neste caso retorna
     * este item do array. Caso contrario, retorna null
     */    
    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
}

