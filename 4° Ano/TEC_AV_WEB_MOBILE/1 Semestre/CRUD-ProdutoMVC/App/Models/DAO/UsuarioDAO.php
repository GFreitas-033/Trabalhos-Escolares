<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function listar($login = null)
    {
        if ($login) {
            $resultado = $this->select(
                "SELECT * FROM usuario WHERE login = '{$login}'"
            );

            return $resultado->fetchObject(Usuario::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM usuario'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
        }

        return false;
    }

    public function salvar(Usuario $usuario)
    {
        try {
            $login      = $usuario->getLogin();
            $nome       = $usuario->getNome();
            $senha      = $usuario->getSenha();
            $email      = $usuario->getEmail();
            $permissao  = $usuario->getPermissao();

            return $this->insert(
                'usuario',
                ":login, :nome, :senha, :email, :permissao",
                [
                    ':login' => $login,
                    ':nome' => $nome,
                    ':senha' => $senha,
                    ':email' => $email,
                    ':permissao' => $permissao,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function atualizar(Usuario $usuario)
    {
        try {
            $login      = $usuario->getLogin();
            $nome       = $usuario->getNome();
            $senha      = $usuario->getSenha();
            $email      = $usuario->getEmail();
            $permissao  = $usuario->getPermissao();

            return $this->update(
                'usuario',
                "nome = :nome, senha = :senha, email = :email, permissao = :permissao",
                [
                    ':login' => $login,
                    ':nome' => $nome,
                    ':senha' => $senha,
                    ':email' => $email,
                    ':permissao' => $permissao,
                ],
                "login = :login"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Usuario $usuario)
    {
        try {
            $login = $usuario->getLogin();

            return $this->delete('usuario', "login = '{$login}'");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
