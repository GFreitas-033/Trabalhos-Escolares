@extends('layout.site')

@section('main')
    <div class="container mt-4">
        <h1>Listagem de Produtos</h2>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif        

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th class="info">Id</th>
                        <th class="info">Nome</th>
                        <th class="info">Descrição</th>
                        <th class="info">Preço</th>
                        <th class="info">Qtde.</th>
                        <th class="info">Fornecedor</th>
                        <th class="info"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->nome }}</td>
                            <td>{{ $registro->descricao }}</td>
                            <td>{{ $registro->preco }}</td>
                            <td>{{ $registro->quantidade }}</td>
                            <td><a href="{{ route('fornecedores.visualizar',$registro->fornecedor_id) }}">{{ $registro->fornecedor->nome }}</a></td>
                            <td>
                                <a href="/produto/editar/{{ $registro->id }}" class="btn btn-info btn-sm">Editar</a>
                                <a href="/produto/confirmaExcluir/{{ $registro->id }}/{{ $registro->nome }}" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
