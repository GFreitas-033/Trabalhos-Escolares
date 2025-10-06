<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function listar(){
    
        $registros = Produto::all();
        // dd($registros);
        return view('produto.listar', compact('registros'));
    }    

    public function cadastrar(){
        
        return view('produto.cadastrar');
    }

    public function salvar(Request $req){

        // Validação com mensagens personalizadas
        $req->validate([
            'nome' => 'required|max:200',
            'descricao' => 'required',
            'preco' => 'required|decimal:2',
            'quantidade' => 'required|integer|min:1',
            ], [
            'nome.*' => 'O campo Nome é obrigatório e deve ter no máximo 200 caracteres!',
            'descricao.required' => 'O campo Descrição é obrigatório!',
            'preco.*' => 'O campo Preço é obrigatório e deve ter duas casas decimais!',
            'quantidade.*' => 'O campo Quantidade é obrigatório e deve ser maior que zero!'
        ]
        );

        //Grava os dados no Banco
        Produto::create($req->all());

        return redirect('/produto/listar')->with('success', 'Produto gravado com sucesso!');

    }

    public function editar(string $id){
    
        $registro = Produto::find($id);
        return view('produto.editar',compact('registro'));
    }

    public function atualizar(Request $req){

        // Validação com mensagens personalizadas
        $req->validate([
            'nome' => 'required|max:200',
            'descricao' => 'required',
            'preco' => 'required|decimal:2',
            'quantidade' => 'required|integer|min:1',
            ], [
            'nome.*' => 'O campo Nome é obrigatório e deve ter no máximo 200 caracteres!',
            'descricao.required' => 'O campo Descrição é obrigatório!',
            'preco.*' => 'O campo Preço é obrigatório e deve ter duas casas decimais!',
            'quantidade.*' => 'O campo Quantidade é obrigatório e deve ser maior que zero!'
        ]
        );

        //Atualiza os dados no Banco
        Produto::find($req->input('id'))->update($req->all());  
        
        return redirect('/produto/listar')->with('success', 'Produto atualizado com sucesso!');
    }  

    public function excluir($id){
    
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('/produto/listar')->with('success', 'Produto excluído com sucesso!');
    }

}
