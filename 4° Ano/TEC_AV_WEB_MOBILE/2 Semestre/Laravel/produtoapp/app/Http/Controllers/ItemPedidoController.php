<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;

class ItemPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::latest()->Paginate(2);
        if ($pedidos->count()==0){
            session(['erro' => 'Nenhum Pedido Encontrado!']);
        }

        $pedido = null;
        if (session()->has('pedido_id')){
            $pedidoId = session('pedido_id');
            $pedido = Pedido::find($pedidoId);
        }
        
        return view('pedido.index', compact('pedidos'), compact('pedido'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido, $cliente_id, $cliente_nome)
    {
        session()->flash('ModalAdicionarProduto',true);
        session()->flash('pedido_id',$pedido->id);
        session()->flash('cliente_id',$cliente_id);
        session()->flash('cliente_nome',$cliente_nome);

        return redirect()->route('item-pedido.index')->withInput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        session()->flash('ModalAdicionarProduto',true);
        session()->flash('pedido_id',$pedido->id);
        session()->flash('cliente_nome',$request->get('cliente_nome'));

        $request->validate([
            'produto_id' => ['required','exists:produtos,id'],
            'quantidade' => ['required','integer','min:1']
        ], [
            'produto_id.required' => 'O campo Produto é obrigatório!',
            'produto_id.exists' => 'Produto NÃO localizado!',
            'quantidade.required' => 'A Quantidade é obrigatória!',
            'quantidade.min' => 'A quantidade deve ser no mínimo 1!',
        ]);

        $produto = Produto::find($request->get('produto_id'));
        $quantidadeSolicitada = $request->get('quantidade');

        // VERIFICA ESTOQUE
        if ($produto->quantidade < $quantidadeSolicitada) {
            return redirect()->route('item-pedido.index')
                ->with('erro', "Estoque insuficiente! Disponível: {$produto->quantidade}");
        }

        // DEBITA ESTOQUE
        $produto->decrement('quantidade', $quantidadeSolicitada);

        // SALVA ITEM
        $itemPedido = new ItemPedido();
        $itemPedido->pedido_id = $pedido->id;
        $itemPedido->produto_id = $produto->id;
        $itemPedido->quantidade = $quantidadeSolicitada;
        $itemPedido->save();
        
        return redirect()->route('item-pedido.index')->with('success', 'Item Adicionado e Estoque Atualizado!');        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemPedido = ItemPedido::findOrFail($id);
        
        $pedido = Pedido::find($itemPedido->pedido_id);
        session()->flash('ModalAdicionarProduto', true);
        session()->flash('pedido_id', $pedido->id);
        session()->flash('cliente_nome', $pedido->cliente->nome);

        $produto = Produto::find($itemPedido->produto_id);
        if($produto) {
            $produto->increment('quantidade', $itemPedido->quantidade);
        }

        $itemPedido->delete();

        return redirect()->route('item-pedido.index')->with('sucesso', 'Item removido e estoque estornado!');
    }
}
