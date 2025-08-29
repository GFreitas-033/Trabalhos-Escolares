<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ProdutoDAO;
use App\Models\Entidades\Produto;
use App\Lib\Util;

class ProdutoController extends Controller
{
    public function listar()
    {
        $produtoDAO = new ProdutoDAO();  //Conecta ao Banco

       self::setViewParam('listaProdutos',$produtoDAO->listar());//busca os dados

        $this->render('/produto/listar'); //Passa os dados p/ a view listar

        Sessao::limpaMensagem();
    }
    
    public function editar($params)
    {
      $id = $params[0]; //Pega o id do produto a ser editado

      $produtoDAO = new ProdutoDAO();

      $objProduto = $produtoDAO->listar($id);

      if ($objProduto==null) //Se NÃO achou produto
      {
        Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Falha ao recuperar dados do produto id='.$id.'</div>');
        $this->redirect('/produto/listar');
      }
            
      self::setViewParam('produto',$objProduto);

      $this->render('/produto/editar');

      Sessao::limpaMensagem();      
    }

    public function salvar($param) {
      $cmd = $param[0]; //Pega o comando: editar ou novo
      //Sanitização dos dados do Formulário
      $dadosform = Util::sanitizar($_POST);

      $objproduto = new Produto();
      //Transfere os dados do Produto do Formulário para o Objeto
      $objproduto->setProduto($dadosform);
      
      $errovalidacao = false;
      //Aplicar a Validação dos Dados segundo as regras de negócio
      //Aqui pode-se criar uma classe separada de Validação
      if (empty($dadosform['preco'])) {
        Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Verifique os Campos em Vermelho.</div>');
        //Habilita o 'is-invalide' do feedback do campo preço do Form
        Sessao::gravaErro('erropreco','Este campo deve ser preemchido');
        $errovalidacao = true;
      }

      if ($errovalidacao) { //Houve erro na validacao
        //Guarda os dados do POST na viewVar para reapresentar os dados
        self::setViewParam('produto',$objproduto);
        if ($cmd=='editar'){ //O produto está sendo editado
          $this->render('/produto/editar');//Retorna ao Formulário de edição
        }elseif ($cmd == 'novo'){ //O produto está sendo cadastrado
          $this->render('/produto/cadastrar');//Retorna ao Formulário de cadastro de novo produto
        }
        die(); //Isso é necessário senão ele vai continuar e cadastrar o produto!!!
      }
      //Se passou pela validação sem erros, continua aqui
        
      $produtoDAO = new ProdutoDAO(); //Conecta no Banco
      
      if ($cmd=='editar'){ //Salvar produto editado
        $produtoDAO->atualizar($objproduto);
        Sessao::gravaMensagem('<div class="alert alert-success" role="alert">Produto atualizado com sucesso.</div>');
      }elseif ($cmd == 'novo'){ //Salvar novo produto
        $produtoDAO->salvar($objproduto);
        Sessao::gravaMensagem('<div class="alert alert-success" role="alert">Novo Produto gravado com sucesso.</div>');
      }
      
      //Limpa Tudo
      Sessao::limpaErro();
      //Redireciona para o listar que vai exibir msg de feedback
      $this->redirect('/produto/listar');      
    }
    
    public function excluirConfirma($param) //Confirma Exclusão do produto
    {
      $id = $param[0]; //Pega o id do produto a ser excluído
      
      $produtoDAO = new ProdutoDAO();

      $objProduto = $produtoDAO->listar($id);

      if ($objProduto==null) //Se NÃO achou produto
      {
        Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Falha ao recuperar dados do produto id='.$id.'</div>');
        $this->redirect('/produto/listar');
      }
            
      self::setViewParam('produto',$objProduto);
      
      $this->render('/produto/excluirConfirma');//Retorna ao Formulário
    }
    
    public function excluir($param)
    {
      $objproduto = new Produto();
      //Pega o id do produto a ser excluído
      $objproduto->setId(Util::sanitizar($_POST['id']));
      
      $produtoDAO = new ProdutoDAO();

      if(!$produtoDAO->excluir($objproduto)){
        Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Produto Não Encontrado.</div>');
      }else{
        Sessao::gravaMensagem('<div class="alert alert-success" role="alert">Produto excluído com sucesso!.</div>');
      }
      $this->redirect('/produto/listar');  
    }

    public function cadastrar()
    {
        $this->render('/produto/cadastrar');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }


    
}
