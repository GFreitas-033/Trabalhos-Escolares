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
@endsection
