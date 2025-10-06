<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class LoginController extends Controller
{
    public function showFormLogin(){
        return view('login.formLogin');
    }

    public function validarLogin(Request $req){
        // Validação com mensagens personalizadas
        $req->validate([
            'email' => 'required|max:255',
            'senha' => 'required|min:4|max:255',
            ], [
            'email.*' => 'O campo Email é obrigatório!',
            'senha.*' => 'O campo Senha é obrigatório e deve ter no mínimo 4 caracteres!',
        ]
        );

        //Pega as informações de email/senha recebidas do Formulário
        $email = $req->get('email');
        $senha = $req->get('senha');

        //Busca o usuário no Banco via o email digitado
        $usuario = User::where('email',$email)->get()->first();

        //Verifica se foi encontrado um usuário com o email e se a senha está correta
        if ($usuario && Hash::check($senha, $usuario->password)) {
            //Login bem-sucedido - Coloca as informações do usuário na Sessão
            session(['usuario.logado'=>true]);
            session(['usuario.id'=>$usuario->id]);
            session(['usuario.name'=>$usuario->name]);
            session(['usuario.email'=>$usuario->email]);
            session(['usuario.permissao'=>$usuario->permissao]);

            //Direciona o usuário logado para a Home da Aplicação ou 
            //a página que ele tinha intenção de acessar anteriormente
            return redirect()->intended('/');            
        } else {
            //Credenciais inválidas
            //Coloca o campo email na sessão->flash para ser recuperado pelo old()
            $req->flashOnly(['email']);
            //Redireciona para a página anterior (Login)
            return back()->with('erro', 'Email ou senha inválidos!');
        }        
    }

    public function logout(Request $req){
        //Remove todos os dados da Sessão do usuário
        $req->session()->flush();

        //Redireciona o usuário para a página de Login
        return redirect()->route('login');
    }        
}
