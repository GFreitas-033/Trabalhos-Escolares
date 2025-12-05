@extends('layout.site')

@section('main')
<div class="container mt-4">

    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4>Detalhes do Fornecedor</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-2 form-label fw-bold">ID:</label>
                    <div class="col-sm-6">
                        {{ $fornecedor->id }}
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 form-label fw-bold">Nome:</label>
                    <div class="col-sm-6">
                        {{ $fornecedor->nome }}
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 form-label fw-bold">Site:</label>
                    <div class="col-sm-6">
                        {{ $fornecedor->site }}
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 form-label fw-bold">UF:</label>
                    <div class="col-sm-6">
                        {{ $fornecedor->uf }}
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 form-label fw-bold">Email:</label>
                    <div class="col-sm-6">
                        {{ $fornecedor->email }}
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
