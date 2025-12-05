<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autenticacao;
use App\Http\Middleware\Permissao;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ItemPedidoController;

Route::middleware([Autenticacao::class])->group(function () {
    Route::get('/',[HomeController::class,'index']);
    Route::get('/home',[HomeController::class,'index']);

    Route::get('/produto/listar',[ProdutoController::class,'listar'])
            ->middleware([Autenticacao::class]);
    
    Route::get('/cliente/pesquisar', [ClienteController::class, 'pesquisar'])->name('cliente.pesquisar');
    
    Route::get('/produto/pesquisar', [ProdutoController::class, 'pesquisar'])
        ->name('produto.pesquisar');
    
    Route::match(['get', 'post'], '/pedido/relatorio-cliente', [PedidoController::class, 'relatorioCliente'])->name('pedido.relatorioCliente');

    Route::resource('cliente',ClienteController::class);
    Route::resource('pedido',PedidoController::class);
    
    Route::post('/item-pedido/store/{pedido}',[ItemPedidoController::class,'store'])->name('item-pedido.store');
    Route::get('/item-pedido/create/{pedido}/{cliente_id}/{cliente_nome}', [ItemPedidoController::class, 'create'])->name('item-pedido.create');
    Route::get('/item-pedido',[ItemPedidoController::class,'index'])->name('item-pedido.index');
    
    Route::delete('/item-pedido/{itemPedido}', [ItemPedidoController::class, 'destroy'])->name('item-pedido.destroy');

    Route::middleware(Permissao::class.':Normal')->group(function () {        
        Route::get('/produto/cadastrar',[ProdutoController::class,'cadastrar']);
        Route::post('/produto/salvar',[ProdutoController::class,'salvar']);
        Route::get('/produto/editar/{id}',[ProdutoController::class,'editar']);
        Route::post('/produto/atualizar',[ProdutoController::class,'atualizar']);
        Route::get('/produto/confirmaExcluir/{id}/{nome}', function($id, $nome){
           return view('produto.confirmaExcluir', ['id' => $id, 'nome' => $nome]);
        });
        Route::delete('/produto/excluir/{id}',[ProdutoController::class,'excluir']);
        
        Route::get('/produto/quantidade/{id}', [ProdutoController::class, 'quantidade']);
    });

    Route::middleware(Permissao::class.':Admin')->group(function () {
        Route::get('/user',[UserController::class,'index']);
        Route::post('/user/salvarnovo',[UserController::class,'salvarnovo']);
        Route::post('/user/salvarEditado',[UserController::class,'salvarEditado']);
        Route::post('/user/atualizarSenha',[UserController::class,'atualizarSenha']);
        Route::post('/user/excluir',[UserController::class,'excluir']);

        Route::get('/fornecedor',[FornecedorController::class,'index']);
        Route::post('/fornecedor/salvarnovo',[FornecedorController::class,'salvarnovo']);
        Route::post('/fornecedor/salvarEditado',[FornecedorController::class,'salvarEditado']);
        Route::post('/fornecedor/atualizarSenha',[FornecedorController::class,'atualizarSenha']);
        Route::post('/fornecedor/excluir',[FornecedorController::class,'excluir']);
        
        Route::get('/fornecedores/minhaPesquisa', [FornecedorController::class, 'minhaPesquisa'])->name('fornecedores.minhaPesquisa');

        Route::get('/fornecedores/pesquisar', [FornecedorController::class, 'pesquisar'])->name('fornecedores.pesquisar');

        Route::get('/fornecedores/visualizar/{fornecedor}', [FornecedorController::class, 'visualizar'])->name('fornecedores.visualizar');
    });
    Route::get('/logout',[LoginController::class,'logout'])->name('sair');
});    

Route::get('/login',[LoginController::class,'showFormLogin'])->name('login');
Route::post('/login',[LoginController::class,'validarLogin'])->name('validarLogin');

Route::get('/date', function () {
    return date("d/m/Y h:i:sa");
});
Route::get('/phpinfo', function () {
    return phpinfo();
});