<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\Validator; // Importar a classe Validator
use Illuminate\Validation\Rule; // Importar a classe Rule

class FornecedorController extends Controller
{
    public function index(){

        $registros = Fornecedor::all();
        if ($registros->count()==0){
            session(['erro' => 'Nenhum Fornecedor Encontrado!']);
        }
        return view('fornecedor.index', compact('registros'));
    }

    public function salvarnovo(Request $req){

        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição) para
        //indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal','ModalNovoFornecedor');

        // Validação com mensagens personalizadas
        $req->validate([
            'nome' => 'required|max:255', // Corrigido de 'name' para 'nome'
            'site' => 'required|max:255',
            'uf' => 'required|max:255',
            'email' => 'required|max:255|unique:fornecedors,email',
            ], [
            'email.unique' => 'Já existe um Fornecedor cadastrado com este Email!',
            'email.required' => 'O campo Email é obrigatório!',
            'email.max' => 'O campo Email deve ter no máximo 255 caracteres!',
            'nome.required' => 'O campo Nome é obrigatório!', // Corrigido de 'name.*' para regras específicas
            'nome.max' => 'O campo Nome deve ter no máximo 255 caracteres!',
            'site.required' => 'O campo Site é obrigatório!',
            'site.max' => 'O campo Site deve ter no máximo 255 caracteres!',
            'uf.required' => 'O campo UF é obrigatório!',
            'uf.max' => 'O campo UF deve ter no máximo 255 caracteres!',
        ]);

        //Grava os dados no Banco
        Fornecedor::create($req->all());
        return redirect('/fornecedor')->with('sucesso', 'Fornecedor Cadastrado.');
    }//Fim salvarnovo()

    public function salvarEditado(Request $req){

        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal','ModalEditarFornecedor');

        // Validação com mensagens personalizadas
        $req->validate([
            'email' => [
                'required',
                'max:255',
                Rule::unique('fornecedors','email')->ignore($req->id),
                ],
            'nome' => 'required|max:255', // Corrigido de 'name' para 'nome'
            'site' => 'required|max:255',
            'uf' => 'required|max:255',
            ], [
            'email.unique' => 'Já existe um Fornecedor cadastrado com este Email!',
            'email.required' => 'O campo Email é obrigatório!',
            'email.max' => 'O campo Email deve ter no máximo 255 caracteres!',
            'nome.required' => 'O campo Nome é obrigatório!', // Corrigido de 'name.*' para regras específicas
            'nome.max' => 'O campo Nome deve ter no máximo 255 caracteres!',
            'site.required' => 'O campo Site é obrigatório!',
            'site.max' => 'O campo Site deve ter no máximo 255 caracteres!',
            'uf.required' => 'O campo UF é obrigatório!',
            'uf.max' => 'O campo UF deve ter no máximo 255 caracteres!',
        ]);

        ///Atualiza os dados no Banco
        Fornecedor::find($req->input('id'))->update($req->all());

        return redirect('/fornecedor')->with('sucesso', 'Fornecedor Atualizado.');
    }//Fim salvarEditado()

    public function excluir(Request $req){

        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal','ModalExcluirFornecedor');

        // Validação com mensagens personalizadas
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'email' => 'required|max:255',
            'nome' => 'required|max:255', // Corrigido de 'name' para 'nome'
            'site' => 'required|max:255', // Corrigido de 'max255' para 'max:255'
            'uf' => 'required|max:255',   // Corrigido de 'max255' para 'max:255'
            ], [
            'id.required' => 'Id do fornecedor é necessário!',
            'email.*' => 'O campo Email é obrigatório e deve ter no máximo 255 caracteres!',
            'nome.*' => 'O campo Nome é obrigatório e deve ter no máximo 255 caracteres!',
            'site.*' => 'O campo Site é obrigatório e deve ter no máximo 255 caracteres!',
            'uf.*' => 'O campo UF é obrigatório e deve ter no máximo 255 caracteres!',
        ]);

        //Validação se existe um Fornecedor com estes id, email e nome, pois embora estes dados
        // não sejam editáveis na interface, o usuário pode utilizar F12 e alterá-los
        $validator->after(function ($validator) use ($req) {
            // CORREÇÃO: Estava buscando em 'User' em vez de 'Fornecedor'
            $existe = Fornecedor::where('id', $req->id)
                                ->where('email', $req->email)
                                ->where('nome', $req->nome) // Corrigido de 'name' para 'nome'
                                ->where('site', $req->site)
                                ->where('uf', $req->uf)
                                ->exists();

            if (! $existe) {
                $validator->errors()->add('fornecedornaoexiste', 'Não existe um Fornecedor com essas informações!');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                              ->withErrors($validator)
                              ->withInput();
        }

        //Passou pelas Validações, então exclui o Fornecedor
        Fornecedor::find($req->input('id'))->delete();

        return redirect('/fornecedor')->with('sucesso', 'Fornecedor Excluído.');
    }//Fim excluir()

    public function minhaPesquisa(Request $req){
        $nome = $req->input('nome');
        $registros = Fornecedor::where('nome', 'like', '%'.$nome.'%')->get();
        if ($registros->count()==0){
            session(['erro' => 'Nenhum Fornecedor Encontrado com este nome!']);
        }else{
            session(['sucesso' => 'Foram encontrados '.$registros->count().' fornecedores.']);
        }
        return view('fornecedor.index', compact('registros'));
    }
    
    public function pesquisar(Request $request){
        $termo_busca = $request->get('q');
        $results = Fornecedor::where('nome', 'like', "%{$termo_busca}%")
                    ->select('id', 'nome')
                    ->orderBy('nome')
                    ->limit(10)
                    ->get();

        return response()->json($results);
    }

    public function visualizar(Fornecedor $fornecedor){
    
        // dd($fornecedor);
        return view('fornecedor.visualizar',compact('fornecedor'));
    }
}