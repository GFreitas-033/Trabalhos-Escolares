@extends('layout.site')

@section('main')
<div class="container mt-4">
    <h1 class="text-center">Cadastrar Produto</h2>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error) 
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/produto/salvar" method="post">
                @csrf
                <div class="mb-3 position-relative">
                    <label class="form-label">Fornecedor</label>
                    <input class="form-control" type="text" id="fornecedor" name="fornecedor_nome" value="{{ old('fornecedor_nome') }}" placeholder="Digite o nome do fornecedor...">
                    <input type="hidden" name="fornecedor_id" id="fornecedor_id" value="{{ old('fornecedor_id') }}">

                    <div id="lista-fornecedores" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                </div>
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="textarea" class="form-control" name="descricao" value="{{ old('descricao') }}" required></textarea>
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    R$ <input type="text" class="form-control" name="preco" value="{{ old('preco') }}">
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" value="{{ old('quantidade') }}" required>
                </div>	                
                <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
            </form>
        </div>
    </div>      
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#fornecedor').on('keyup', function() {
    let query = $(this).val();

    if (query.length >= 2) {
        $.get('{{ route("fornecedores.pesquisar") }}', { q: query }, function(data) {
            let lista = $('#lista-fornecedores');
            lista.empty();

            data.forEach(function(fornecedor) {
                lista.append(
                    `<a href="#" class="list-group-item list-group-item-action" 
                        data-id="${fornecedor.id}" data-nome="${fornecedor.nome}">
                        ${fornecedor.nome}
                    </a>`
                );
            });

            lista.show();
        });
    }
});

$(document).on('click', '.list-group-item', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let nome = $(this).data('nome');

    $('#fornecedor').val(nome);
    $('#fornecedor_id').val(id);
    $('#lista-fornecedores').hide();
});
</script>
@endsection
