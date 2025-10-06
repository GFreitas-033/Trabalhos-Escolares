<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
  
        $registros = User::all();
        if ($registros->count()==0){
            session(['erro' => 'Nenhum Usuário Encontrado!']);
        }
        return view('user.index', compact('registros'));           
    }

    public function salvarnovo(Request $req){

        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição) para
        //indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal','ModalNovoUsuario');

        // Validação com mensagens personalizadas
        $req->validate([
            'email' => 'required|max:255|unique:users,email',
            'name' => 'required|max:255',
            'password' => 'required|min:4|max:255',
            'permissao' => 'required|in:Admin,Normal,Leitura',
            ], [
            'email.unique' => 'Já existe um Usuário cadastrado com este Email!',
            'email.required|max' => 'O campo Email é obrigatório e deve ter no máximo 255 caracteres!', 
            'name.*' => 'O campo Nome é obrigatório e deve ter no máximo 255 caracteres!',
            'password.*' => 'O campo Senha é obrigatório e deve ter no mínimo 4 caracteres!',
            'permissao.*' => 'Selecione uma permissão!'
        ]
        );

        //Grava os dados no Banco
        User::create($req->all());       
        return redirect('/user')->with('sucesso', 'Usuário Cadastrado.');
    }//Fim salvarnovo()

    public function salvarEditado(Request $req){

        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal','ModalEditarUsuario');

        // Validação com mensagens personalizadas
        $req->validate([
            'email' => [
                'required',
                'max:255',
                Rule::unique('users','email')->ignore($req->id),
                ],            
            'name' => 'required|max:255',
            'permissao' => 'required|in:Admin,Normal,Leitura',
            ], [
            'email.unique' => 'Já existe um Usuário cadastrado com este Email!',
            'email.required|max' => 'O campo Email é obrigatório e deve ter no máximo 255 caracteres!', 
            'name.*' => 'O campo Nome é obrigatório e deve ter no máximo 255 caracteres!',
            'permissao.*' => 'Selecione uma permissão!'
        ]
        );

        ///Atualiza os dados no Banco
        User::find($req->input('id'))->update($req->all());  

        return redirect('/user')->with('sucesso', 'Usuário Atualizado.');
    }//Fim salvarEditado()

    public function atualizarSenha(Request $req){

        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal','ModalRessetarSenha');

        // Validação com mensagens personalizadas
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'email' => 'required|max:255',
            'name' => 'required|max:255',
            'password' => 'required|min:4|max:255',
            ], [
            'id.required' => 'Id do usuário é necessário!',
            'email.*' => 'O campo Email é obrigatório e deve ter no máximo 255 caracteres!',
            'name.*' => 'O campo Nome é obrigatório e deve ter no máximo 255 caracteres!',
            'password.*' => 'O campo Senha é obrigatório e deve ter no mínimo 4 caracteres!',
        ]
        );

        //Validação se existe um usuário com estes id, email e nome, pois embora estes dados
        // não sejam editáveis na interface, o usuário pode utilizar F12 e alterá-los
        $validator->after(function ($validator) use ($req) {
            $existe = User::where('id', $req->id)
                          ->where('email', $req->email)
                          ->where('name', $req->name)
                          ->exists();
    
            if (! $existe) {
                $validator->errors()->add('usernaoexiste', 'Não existe um Usuário com essas informações!');
            }
        });

        //Validação se foi alterada a senha
        //Busca o usuário pelo ID
        $user = User::find($req->id);
        $validator->after(function ($validator) use ($req, $user) {
            if (Hash::check($req->password, $user->password)) {
                $validator->errors()->add('senhaigual', 'A nova senha é igual a senha atual.');
            }
        });
    
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }        

        //Passou pelas Validações, então
        //Atualiza o campo password do usuário
        User::find($req->input('id'))->update([
            'password' => Hash::make($req->input('password')),
        ]);

        return redirect('/user')->with('sucesso', 'Senha do Usuário Atualizada.');
    }//Fim satualizarSenha()


    public function excluir(Request $req){

        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal','ModalExcluirUsuario');

        // Validação com mensagens personalizadas
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'email' => 'required|max:255',
            'name' => 'required|max:255',
            ], [
            'id.required' => 'Id do usuário é necessário!',
            'email.*' => 'O campo Email é obrigatório e deve ter no máximo 255 caracteres!',
            'name.*' => 'O campo Nome é obrigatório e deve ter no máximo 255 caracteres!',
        ]
        );

        //Validação se existe um usuário com estes id, email e nome, pois embora estes dados
        // não sejam editáveis na interface, o usuário pode utilizar F12 e alterá-los
        $validator->after(function ($validator) use ($req) {
            $existe = User::where('id', $req->id)
                          ->where('email', $req->email)
                          ->where('name', $req->name)
                          ->exists();
    
            if (! $existe) {
                $validator->errors()->add('usernaoexiste', 'Não existe um Usuário com essas informações!');
            }
        });
    
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }        

        //Passou pelas Validações, então exclui o usuário
        User::find($req->input('id'))->delete();

        return redirect('/user')->with('sucesso', 'Usuário Excluído.');
    }//Fim excluir()    


}
