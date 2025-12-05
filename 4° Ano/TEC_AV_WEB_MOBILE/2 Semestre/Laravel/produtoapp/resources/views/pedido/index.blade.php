@extends('layout.site')

@if (session()->has('ModalNovoPedido'))
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          var modal = new bootstrap.Modal(document.getElementById("ModalNovoPedido"));
          modal.show();
      });
  </script>
@endif

@if (session()->has('ModalAdicionarProduto'))
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          var modal = new bootstrap.Modal(document.getElementById("ModalAdicionarProduto"));
          modal.show();
      });
  </script>
@endif

@section('main')
  <div class="container">
  
    <div class="row">  
      <div class="col-md-8">  
        <h3 class="h3 mt-2">Manutenção de Pedidos</h3>
      </div>
      <div class="col-md-2">
        <a href="{{ route('pedido.create')}}" class="btn btn-outline-primary btn-sm mb-2 mt-2" id='btnNovoPedido'> Novo Pedido </a>
      </div>
      <div class="col-md-2">
        <a href="{{ route('pedido.relatorioCliente') }}" class="btn btn-outline-secondary btn-sm mb-2 mt-2" > Consultar</a> 
      </div>            
    </div>
    <span>
          @if (session()->has('success')) <div class="alert alert-success">
                {{ session('success') }}
            </div>
          @endif
          @if (session('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
          @endif
          @if (session('erro'))
            <div class="alert alert-danger">
                {{ session('erro') }}
            </div>
          @endif        
    </span>          

    <div class="table-responsive">
      <table class="table table-hover table-sm mt-2">
        <thead>
          <tr class="table-info">
            <th class="info">Id Pedido</th>
            <th class="info">Cliente</th>
            <th class="info">Data</th>
            <th class="info"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedidoLista)
          <tr>
            <td>{{ $pedidoLista->id }}</td>
            <td>{{ $pedidoLista->cliente->nome }}</td>
            <td>{{ $pedidoLista->created_at->format('d/m/Y') }}</td>
          
            <td style="text-align: right;">
              <a href="{{ route('item-pedido.create', [
                          'pedido' => $pedidoLista->id,
                          'cliente_id' => $pedidoLista->cliente->id,
                          'cliente_nome' => $pedidoLista->cliente->nome
                        ]) }}"
                  class="btn btn-outline-success btn-sm mr-2" id="btnAdicionarProduto"> Adicionar Produto
              </a>
              
              <button type="button" class="btn btn-outline-info btn-sm mr-2" 
                      data-bs-toggle="modal" 
                      data-bs-target="#ModalEditarPedido" 
                      data-id="{{ $pedidoLista->id }}" 
                      data-cliente-nome="{{ $pedidoLista->cliente->nome }}"
                      data-cliente-id="{{ $pedidoLista->cliente->id }}">
                  Editar
              </button>

              <button type="button" class="btn btn-outline-danger btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#ModalExcluirPedido" 
                      data-id="{{ $pedidoLista->id }}" 
                      data-nome="{{ $pedidoLista->cliente->nome }}">
                  Excluir
              </button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <div class="mx-auto col-md-3">
      {{ $pedidos->links() }} 
    </div>

    <div class="modal fade" id="ModalNovoPedido">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Cadastrar Novo Pedido</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formNovoPedido" action="{{ route('pedido.store') }}"  method="post">
            @csrf
             <div class="modal-body">
                @if ($errors->any() && session()->has('ModalNovoPedido'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                <div class="mb-3 position-relative">
                    <label class="form-label">Nome Cliente</label>
                    <input class="form-control" type="text" id="cliente" name="cliente_nome" value="{{ old('cliente_nome') }}" placeholder="Digite o nome do Cliente..." autocomplete="off">
                    <input type="hidden" name="cliente_id" id="cliente_id" value="{{ old('cliente_id') }}">
                    <div id="lista-clientes" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                </div>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="ModalEditarPedido">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar Pedido</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formEditarPedido" method="post">
            @csrf
            @method('PUT')
             <div class="modal-body">
                <div class="mb-3 position-relative">
                    <label class="form-label">Nome Cliente</label>
                    <input class="form-control" type="text" id="cliente_edit" name="cliente_nome" required autocomplete="off">
                    <input type="hidden" name="cliente_id" id="cliente_id_edit">
                    <div id="lista-clientes-edit" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                </div>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-primary">Atualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalExcluirPedido">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-danger">Excluir Pedido</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formExcluirPedido" method="post">
            @csrf
            @method('DELETE')
             <div class="modal-body">
                <p>Tem certeza que deseja excluir o pedido de <strong id="nome_cliente_excluir"></strong>?</p>
                <p class="text-muted small">Os itens serão removidos e o estoque restaurado.</p>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalAdicionarProduto">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Gerenciar Itens do Pedido</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="formAdicionarProduto" method="post">
              @csrf
             <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h6 id="idpedidoadd">ID Pedido: </h6>
                    <h6 id="clientepedidonomeadd">Cliente: </h6>
                </div>
                <hr>

                @if ($errors->any() && session()->has('ModalAdicionarProduto'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  
                <div>
                  <h5 class="text-center"> Itens do pedido </h5>
                  @if (isset($pedido) && (count($pedido->produtos)>0))
                    @php $totalGeral = 0; @endphp
                    <div class="table-responsive">
                      <table class="table table-hover table-sm mt-2">
                        <thead>
                          <tr class="table-info">
                            <th>Produto</th>
                            <th class="text-center">Qtd</th>
                            <th class="text-end">Preço Unit.</th>
                            <th class="text-end">Subtotal</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($pedido->produtos as $produto)
                            @php 
                                $subtotal = $produto->preco * $produto->pivot->quantidade;
                                $totalGeral += $subtotal;
                            @endphp
                            <tr>
                              <td>{{ $produto->nome }}</td>
                              <td class="text-center">{{ $produto->pivot->quantidade }}</td>
                              <td class="text-end">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                              <td class="text-end">R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                              <td class="text-end">
                                  <button type="button" class="btn btn-outline-danger btn-sm btn-remover-item" 
                                          data-id="{{ $produto->pivot->id }}" title="Remover e Estornar Estoque">
                                      <i class="bi bi-trash"></i> X
                                  </button>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-active fw-bold">
                                <td colspan="3" class="text-end">TOTAL GERAL:</td>
                                <td class="text-end">R$ {{ number_format($totalGeral, 2, ',', '.') }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                      </table>
                    </div>
                  @else
                      <p class="text-center text-muted">Nenhum item cadastrado neste pedido.</p>
                  @endif
                </div>

                <hr>
                
                <div class="row">
                    <div class="col-md-8 mb-3 position-relative">
                        <label class="form-label">Produto</label>
                        <input class="form-control" type="text" id="produto_nome" name="produto_nome" value="{{ old('produto_nome') }}" placeholder="Digite o nome do Produto..." autocomplete="off">
                        <input type="hidden" name="produto_id" id="produto_id" value="{{ old('produto_id') }}">
                        <input type="hidden" name="cliente_nome" id="cliente_nome_hidden" value="{{ old('cliente_nome') }}">

                        <div id="lista-produtos" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                        <small>Disponível: <span id="quantidade_disponivel">--</span></small>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Quantidade</label>
                        <input type="number" class="form-control" name="quantidade" value="1" min="1">
                    </div>
                </div>
             </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary">Adicionar Item</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    <form id="formRemoverItem" method="post" action="">
        @csrf
        @method('DELETE')
    </form>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $('#ModalNovoPedido').on('shown.bs.modal', function () {
      $('#cliente').focus();
    });

    $('#ModalAdicionarProduto').on('shown.bs.modal', function (event) {      
      var recipientIdPedido = "{{ session('pedido_id') }}";
      var recipientNomeCliente = "{{ session('cliente_nome') }}";
      
      var modal = $(this);
      modal.find('#idpedidoadd').text("ID Pedido: " + recipientIdPedido);
      modal.find('#clientepedidonomeadd').text("Cliente: " + recipientNomeCliente);
      modal.find('#cliente_nome_hidden').val(recipientNomeCliente);

      var action = "{{ route('item-pedido.store', ':id') }}";
      action = action.replace(':id', recipientIdPedido);
      modal.find('#formAdicionarProduto').attr('action', action);

      $('#produto_nome').focus();
    });

    $('#ModalEditarPedido').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nome = button.data('cliente-nome');
        var clienteId = button.data('cliente-id');
        
        var modal = $(this);
        modal.find('#cliente_edit').val(nome);
        modal.find('#cliente_id_edit').val(clienteId);

        var action = "{{ route('pedido.update', ':id') }}";
        action = action.replace(':id', id);
        modal.find('#formEditarPedido').attr('action', action);
    });

    $('#ModalExcluirPedido').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nome = button.data('nome');
        
        var modal = $(this);
        modal.find('#nome_cliente_excluir').text(nome);

        var action = "{{ route('pedido.destroy', ':id') }}";
        action = action.replace(':id', id);
        modal.find('#formExcluirPedido').attr('action', action);
    });

    $('.btn-remover-item').on('click', function() {
        if(confirm('Deseja remover este item e estornar o estoque?')) {
            var id = $(this).data('id');
            var action = "{{ route('item-pedido.destroy', ':id') }}";
            action = action.replace(':id', id);
            
            $('#formRemoverItem').attr('action', action);
            $('#formRemoverItem').submit();
        }
    });
  </script>

  <script>
    $('#cliente').on('keyup', function() {
      let query = $(this).val();
      if (query.length >= 2) {
        $.get('{{ route("cliente.pesquisar") }}', { q: query }, function(data) {
          let lista = $('#lista-clientes');
          lista.empty();
          data.forEach(function(cliente) {
              lista.append(`<a href="#" class="list-group-item list-group-item-action" data-id="${cliente.id}" data-nome="${cliente.nome}">${cliente.nome}</a>`);
          });
          lista.show();
        });
      }
    });
    $(document).on('click', '#lista-clientes .list-group-item', function(e) {
        e.preventDefault();
        $('#cliente').val($(this).data('nome'));
        $('#cliente_id').val($(this).data('id'));
        $('#lista-clientes').hide();
    });

    $('#cliente_edit').on('keyup', function() {
      let query = $(this).val();
      if (query.length >= 2) {
        $.get('{{ route("cliente.pesquisar") }}', { q: query }, function(data) {
          let lista = $('#lista-clientes-edit');
          lista.empty();
          data.forEach(function(cliente) {
              lista.append(`<a href="#" class="list-group-item list-group-item-action" data-id="${cliente.id}" data-nome="${cliente.nome}">${cliente.nome}</a>`);
          });
          lista.show();
        });
      }
    });
    $(document).on('click', '#lista-clientes-edit .list-group-item', function(e) {
        e.preventDefault();
        $('#cliente_edit').val($(this).data('nome'));
        $('#cliente_id_edit').val($(this).data('id'));
        $('#lista-clientes-edit').hide();
    });

    $('#produto_nome').on('keyup', function() {
        let query = $(this).val();
        if (query.length >= 2) {
          $.get('{{ route("produto.pesquisar") }}', { q: query }, function(data) {
            let lista = $('#lista-produtos');
            lista.empty();
            data.forEach(function(produto) {
                lista.append(`<a href="#" class="list-group-item list-group-item-action" data-id="${produto.id}" data-nome="${produto.nome}">${produto.nome}</a>`);
            });
            lista.show();
          });
        }
    });
    $(document).on('click', '#lista-produtos .list-group-item', function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      $('#produto_nome').val($(this).data('nome'));
      $('#produto_id').val(id);
      $('#lista-produtos').hide();

      $.get('/produto/quantidade/' + id, function(qtd) {
          $('#quantidade_disponivel').text(qtd);
      });
    });
  </script>
@endsection