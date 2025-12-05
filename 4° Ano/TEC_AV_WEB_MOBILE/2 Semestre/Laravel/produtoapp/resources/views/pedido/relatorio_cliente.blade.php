@extends('layout.site')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="h3 mt-2">Relatório de Pedidos por Cliente</h3>
            <hr>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <form action="{{ route('pedido.relatorioCliente') }}" method="POST" class="row g-3 align-items-center">
                @csrf
                <div class="col-auto">
                    <label for="cliente_nome" class="col-form-label">Nome do Cliente:</label>
                </div>
                <div class="col-md-6 position-relative">
                    <input type="text" id="cliente_nome" name="cliente_nome" class="form-control" value="{{ isset($nomeCliente) ? $nomeCliente : '' }}" placeholder="Digite para pesquisar..." autocomplete="off">
                    <div id="lista-clientes-relatorio" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Buscar Pedidos</button>
                    <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>

    @if(session('erro'))
        <div class="alert alert-warning">{{ session('erro') }}</div>
    @endif

    @if(isset($pedidos) && $pedidos->count() > 0)
        <div class="card">
            <div class="card-header bg-info text-white">
                Resultados para: <strong>{{ $nomeCliente }}</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID Pedido</th>
                                <th>Data</th>
                                <th>Produtos (Qtd)</th> <th>Total do Pedido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                @php
                                    $totalPedido = 0;
                                    $listaProdutos = [];
                                    foreach($pedido->produtos as $prod){
                                        $subtotal = $prod->preco * $prod->pivot->quantidade;
                                        $totalPedido += $subtotal;
                                        $listaProdutos[] = $prod->nome . ' (' . $prod->pivot->quantidade . ')';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @foreach($listaProdutos as $item)
                                            <span class="badge bg-secondary">{{ $item }}</span>
                                        @endforeach
                                    </td>
                                    <td>R$ {{ number_format($totalPedido, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#cliente_nome').on('keyup', function() {
      let query = $(this).val();
      if (query.length >= 2) {
        $.get('{{ route("cliente.pesquisar") }}', { q: query }, function(data) {
          let lista = $('#lista-clientes-relatorio');
          lista.empty();
          data.forEach(function(cliente) {
              lista.append(`<a href="#" class="list-group-item list-group-item-action" data-nome="${cliente.nome}">${cliente.nome}</a>`);
          });
          lista.show();
        });
      }
    });

    $(document).on('click', '#lista-clientes-relatorio .list-group-item', function(e) {
        e.preventDefault();
        $('#cliente_nome').val($(this).data('nome'));
        $('#lista-clientes-relatorio').hide();
    });
</script>
@endsection