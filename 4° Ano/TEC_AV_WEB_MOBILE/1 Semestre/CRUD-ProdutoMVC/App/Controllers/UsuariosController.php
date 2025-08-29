<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;
use App\Lib\Util;

class UsuariosController extends Controller
{
    public function listar()
    {
        $usuarioDAO = new UsuarioDAO();

        self::setViewParam('listaUsuarios', $usuarioDAO->listar());

        $this->render('/usuarios/listar');

        Sessao::limpaMensagem();
    }
    
    public function editar($params)
    {
        $login = $params[0];

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($login);

        if (!$usuario) {
            Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Usuário não encontrado.</div>');
            $this->redirect('/usuarios/listar');
        }

        self::setViewParam('usuario', $usuario);

        $this->render('/usuarios/editar');

        Sessao::limpaMensagem();
    }

    public function salvar($param)
    {
        $cmd = $param[0];
        $dadosform = Util::sanitizar($_POST);

        $usuario = new Usuario();
        $usuario->setLogin($dadosform['login']);
        $usuario->setNome($dadosform['nome']);
        $usuario->setSenha($dadosform['senha']);
        $usuario->setEmail($dadosform['email']);
        $usuario->setPermissao($dadosform['permissao']);

        $errovalidacao = false;

        if (empty($dadosform['login']) || empty($dadosform['nome']) || empty($dadosform['senha']) || empty($dadosform['email']) || empty($dadosform['permissao'])) {
            Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Todos os campos devem ser preenchidos.</div>');
            $errovalidacao = true;
        }

        $usuarioDAO = new UsuarioDAO();

        if ($cmd == 'novo') {
            if ($usuarioDAO->listar($usuario->getLogin())) {
                Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Já existe um usuário com este login.</div>');
                $errovalidacao = true;
            }
        }

        if ($errovalidacao) {
            self::setViewParam('usuario', $usuario);
            if ($cmd == 'editar') {
                $this->render('/usuarios/editar');
            } elseif ($cmd == 'novo') {
                $this->render('/usuarios/cadastrar');
            }
            die();
        }

        if ($cmd == 'editar') {
            $usuarioDAO->atualizar($usuario);
            Sessao::gravaMensagem('<div class="alert alert-success" role="alert">Usuário atualizado com sucesso.</div>');
        } elseif ($cmd == 'novo') {
            $usuarioDAO->salvar($usuario);
            Sessao::gravaMensagem('<div class="alert alert-success" role="alert">Novo usuário gravado com sucesso.</div>');
        }

        Sessao::limpaErro();
        $this->redirect('/usuarios/listar');
    }
    
    public function excluirConfirma($param)
    {
        $login = $param[0];

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($login);

        if (!$usuario) {
            Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Usuário não encontrado.</div>');
            $this->redirect('/usuarios/listar');
        }

        self::setViewParam('usuario', $usuario);

        $this->render('/usuarios/excluirConfirma');
    }

    public function excluir($param)
    {
        $usuario = new Usuario();
        $usuario->setLogin(Util::sanitizar($_POST['login']));

        $usuarioDAO = new UsuarioDAO();

        if (!$usuarioDAO->excluir($usuario)) {
            Sessao::gravaMensagem('<div class="alert alert-danger" role="alert">Usuário não encontrado.</div>');
        } else {
            Sessao::gravaMensagem('<div class="alert alert-success" role="alert">Usuário excluído com sucesso!.</div>');
        }
        $this->redirect('/usuarios/listar');
    }

    public function cadastrar()
    {
        $this->render('/usuarios/cadastrar');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }


    
}
