<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Pedido;

class PedidoController extends Controller
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
        return view('pedido.index', compact('pedidos'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session()->flash('ModalNovoPedido',true);
        return redirect()->route('pedido.index')->withInput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session()->flash('ModalNovoPedido',true);

        $request->validate([
            'cliente_nome' => ['required','min:3','max:255','exists:clientes,nome'],
        ], [
            'cliente_nome.exists' => 'Cliente NÃO localizado!',
        ]);

        session()->forget('ModalNovoPedido');
        Pedido::create($request->all());
        return redirect()->route('pedido.index')->with('success', 'Pedido cadastrado com sucesso!');
    }

    public function relatorioCliente(Request $request)
    {
        $pedidos = collect(); 
        $nomeCliente = $request->input('cliente_nome');

        if ($request->isMethod('post') && !empty($nomeCliente)) {
             $pedidos = Pedido::whereHas('cliente', function($query) use ($nomeCliente) {
                 $query->where('nome', 'like', '%' . $nomeCliente . '%');
             })->get();
             
             if($pedidos->isEmpty()){
                 session()->flash('erro', 'Nenhum pedido encontrado para este cliente.');
             }
        }

        return view('pedido.relatorio_cliente', compact('pedidos', 'nomeCliente'));
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
        $pedido = Pedido::findOrFail($id);

        $request->validate([
            'cliente_nome' => ['required','exists:clientes,nome'],
            'cliente_id'   => ['required','exists:clientes,id']
        ]);

        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->save();

        return redirect()->route('pedido.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = Pedido::findOrFail($id);

        foreach ($pedido->produtos as $produto) {
            $produto->increment('quantidade', $produto->pivot->quantidade);
        }

        $pedido->produtos()->detach();

        $pedido->delete();

        return redirect()->route('pedido.index')->with('success', 'Pedido excluído e estoque estornado!');
    }
}
