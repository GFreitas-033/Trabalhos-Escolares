<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Cliente::Paginate(2);
        if ($registros->count()==0){
            session(['erro' => 'Nenhum Cliente Encontrado!']);
        }
        return view('cliente.index', compact('registros'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('ModalNovoCliente',true);
        
        return redirect()->route('cliente.index')->withInput();        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal',true);

        // Validação com mensagens personalizadas
        $request->validate([
            'nome' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('clientes','nome'),
                ],
            ], [
                'nome.min' => 'O campo Nome é obrigatório e deve ter no mínimo 3 e no máximo 255 caracteres!',
                'nome.max' => 'O campo Nome é obrigatório e deve ter no mínimo 3 e no máximo 255 caracteres!',
                'nome.unique' => 'Já existe um Cliente cadastrado com este Nome!',
            ]
        );

        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('sucesso', 'Cliente cadastrado com sucesso!');
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
        //Coloco uma flag na Sessão Flash (só vale até a próxima requisição)
        // Para indicar qual modal na view deve ser reaberto caso aconteça erro de validação
        session()->flash('Modal',true);

        // Validação com mensagens personalizadas
        $request->validate([
            'nome' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('clientes','nome'),
                ],
            ], [
                'nome.min' => 'O campo Nome é obrigatório e deve ter no mínimo 3 e no máximo 255 caracteres!',
                'nome.max' => 'O campo Nome é obrigatório e deve ter no mínimo 3 e no máximo 255 caracteres!',
                'nome.unique' => 'Já existe um Cliente cadastrado com este Nome!',
            ]
        );

        Cliente::find($request->input('id'))->update($request->all()); 
        return redirect()->route('cliente.index')->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index')->with('sucesso', 'Cliente Excluído com sucesso!');
    }

    public function pesquisar(Request $request)
    {
        $termo = $request->get('q');

        $resultados = Cliente::where('nome', 'like', "%{$termo}%")
            ->select('id', 'nome')
            ->orderBy('nome')
            ->limit(10)
            ->get();

        return response()->json($resultados);
    }
}
