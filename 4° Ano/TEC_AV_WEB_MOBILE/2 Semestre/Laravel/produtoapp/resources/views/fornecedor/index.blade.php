@extends('layout.site')

@if ($errors->any())
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          var modal = new bootstrap.Modal(document.getElementById("{{ session('Modal') }}"));
          modal.show();
      });
  </script>
@endif

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h3 class="h3 mt-2">Manutenção de Fornecedores do Sistema</h3>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-outline-primary btn-sm mb-2 mt-2" id='btnNovoFornecedor' data-bs-toggle="modal" data-bs-target="#ModalNovoFornecedor" > Novo Fornecedor </button>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-outline-primary btn-sm mb-2 mt-2" id='btnPesquisarFornecedor' data-bs-toggle="modal" data-bs-target="#ModalPesquisarFornecedor" > Pesquisar Fornecedor </button>
      </div>
    </div>
    <span> @if (session()->has('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
            {{ session()->forget('sucesso') }}
          @endif
          @if (session('erro'))
            <div class="alert alert-danger">
                {{ session('erro') }}
            </div>
            {{ session()->forget('erro') }}
          @endif
    </span>

    <div class="table-responsive">
      <table class="table table-hover table-sm mt-2">
        <thead>
          <tr class="table-info">
            <th class="info">Nome</th>
            <th class="info">Site</th>
            <th class="info">UF</th>
            <th class="info">Email(Login)</th>
            <th class="info"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($registros as $registro)
          <tr>
            <td>{{ $registro->nome }}</td>
            <td>{{ $registro->site }}</td>
            <td>{{ $registro->uf }}</td>
            <td>{{ $registro->email }}</td>

            <td style="text-align: right;">
              {{-- CORREÇÃO: data-nome estava passando $registro->name (que não existe) --}}
              <button type="button" class="btn btn-outline-info btn-sm mr-2" id="btnEditarFornecedor" data-bs-toggle="modal" data-bs-target="#ModalEditarFornecedor" data-ided="{{ $registro->id }}" data-nome="{{ $registro->nome }}" data-site="{{ $registro->site }}" data-uf="{{ $registro->uf }}" data-email="{{ $registro->email }}">Editar</button>

              {{-- CORREÇÃO: data-nomeex estava passando $registro->name (que não existe) --}}
              <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalExcluirFornecedor" data-idex="{{ $registro->id }}" data-nomeex="{{ $registro->nome }}" data-siteex="{{ $registro->site }}" data-ufex="{{ $registro->uf }}" data-emailex="{{ $registro->email }}">Excluir</button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="ModalNovoFornecedor">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Cadastrar Novo Fornecedor</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formNovoFornecedor" action="/fornecedor/salvarnovo"  method="post">
            @csrf
            <div class="modal-body">
                @if ($errors->any() && session('Modal') == 'ModalNovoFornecedor')
                    <div id="msg-erros" class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                  <label for="email_novo" class="col-form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="email_novo" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                  <label for="nome_novo" class="col-form-label">Nome Completo</label>
                  {{-- CORREÇÃO: O atributo 'name' era "name", agora é "nome" --}}
                  <input type="text" class="form-control" name="nome" id="nome_novo" value="{{ old('nome') }}" required>
                </div>
                <div class="form-group">
                  <label for="site_novo" class="col-form-label">Site</label>
                  <input type="text" class="form-control" name="site" id="site_novo" value="{{ old('site') }}" required>
                </div>
                <div class="form-group">
                  <label for="uf_novo" class="col-form-label">UF</label>
                  <input type="text" class="form-control" name="uf" id="uf_novo" value="{{ old('uf') }}" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" id="btnConfirmar" class="btn btn-outline-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div> <div class="modal fade" id="ModalPesquisarFornecedor">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pesquisar Fornecedor</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formPesquisarFornecedor" action="/fornecedor/pesquisar"  method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="nome_pesquisar" class="col-form-label">Nome Completo</label>
                  {{-- CORREÇÃO: value usava old('name'), agora usa old('nome') --}}
                  <input type="text" class="form-control" name="nome" id="nome_pesquisar" value="{{ old('nome') }}" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" id="btnConfirmar" class="btn btn-outline-primary">Pesquisar</button>
            </div>
          </form>
        </div>
      </div>
    </div> <div class="modal fade" id="ModalEditarFornecedor">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar Cadastro do Fornecedor</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  id="formEditarFornecedor" action="/fornecedor/salvarEditado" method="post">
            @csrf
            <div class="modal-body">
              @if ($errors->any() && session('Modal') == 'ModalEditarFornecedor')
                <div id="msg-erros-editar" class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif

              <div class="form-group">
                <input type="hidden" name="id" id="ided">
              </div>
              <div class="form-group">
                <label for="emailed" class="col-form-label">Email</label>
                <input type="text" class="form-control" name="email" id="emailed"  required>
              </div>
              <div class="form-group">
                <label for="nomeed" class="col-form-label">Nome Completo</label>
                 {{-- CORREÇÃO: O atributo 'name' era "name", agora é "nome" --}}
                <input type="text" class="form-control" name="nome" id="nomeed" required>
              </div>
              <div class="form-group">
                <label for="siteed" class="col-form-label">Site</label>
                <input type="text" class="form-control" name="site" id="siteed"  required>
              </div>
              <div class="form-group">
                <label for="ufed" class="col-form-label">UF</label>
                <input type="text" class="form-control" name="uf" id="ufed" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            </div>
          </form>
        </div>
      </div>
    </div>  <div class="modal fade" id="ModalExcluirFornecedor">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Confirma Exclusão do Fornecedor?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </div>
          <form  id="formExcluirFornecedor" action="/fornecedor/excluir" method="post">
            @csrf
            <div class="modal-body">
              @if ($errors->any() && session('Modal') == 'ModalExcluirFornecedor')
                <div id="msg-erros-excluir" class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif
              <div class="form-group">
                <input type="hidden" name="id" id="idex">
              </div>
              <div class="form-group">
                <label for="emailexshow" class="col-form-label">Email</label>
                <input type="text" class="form-control" id="emailexshow" readonly disabled>
                <input type="hidden" class="form-control" name="email" id="emailexhidden">
              </div>
              <div class="form-group">
                <label for="nomeexshow" class="col-form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nomeexshow" readonly disabled>
                 {{-- CORREÇÃO: O atributo 'name' era "name", agora é "nome" --}}
                <input type="hidden" class="form-control" name="nome" id="nomeexhidden">
              </div>
              <div class="form-group">
                <label for="siteexshow" class="col-form-label">Site</label>
                <input type="text" class="form-control" id="siteexshow" readonly disabled>
                <input type="hidden" class="form-control" name="site" id="siteexhidden">
              </div>
              <div class="form-group">
                <label for="ufexshow" class="col-form-label">UF</label>
                <input type="text" class="form-control" id="ufexshow" readonly disabled>
                <input type="hidden" class="form-control" name="uf" id="ufexhidden">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" id="btnExcluir" name="btnExcluir" value="btnExcluir" class="btn btn-outline-danger">Confirmar</button>
            </div>
          </form>
        </div>
      </div>
    </div> </div>


  <script>
    //Aplica autofocus no campo Email do Modal Novo Fornecedor
    const modalNovo = document.getElementById('ModalNovoFornecedor');
    modalNovo.addEventListener('shown.bs.modal', function () {
      document.getElementById('email_novo').focus();
    });
  </script>

  <script>
    //Aplica autofocus no campo Nome do Modal Pesquisar Fornecedor
    // CORREÇÃO: O script focava em 'email', mas este modal só tem 'nome'
    const modalPesquisar = document.getElementById('ModalPesquisarFornecedor');
    modalPesquisar.addEventListener('shown.bs.modal', function () {
      document.getElementById('nome_pesquisar').focus();
    });
  </script>

  <script>
    //Passa parâmetro para o Modal Editar Fornecedor
    $('#ModalEditarFornecedor').on('shown.bs.modal', function (event) {
      if (event.relatedTarget) { // Modal foi aberto por um clique em botão Editar
        var button = $(event.relatedTarget); //Botão que ativou o Modal
        // CORREÇÃO: button.data('name') para button.data('nome')
        var recipientId    = button.data('ided');
        var recipientNome  = button.data('nome');
        var recipientEmail = button.data('email');
        var recipientSite  = button.data('site');
        var recipientUf    = button.data('uf');

        // Remove a div de mensagens de erro dentro do Modal
        const mensagensErro = document.querySelector('#msg-erros-editar');
        if (mensagensErro) {
            mensagensErro.remove();
        }
      }else{
        // CORREÇÃO: old('name') para old('nome')
        var recipientId    = "{{ old('id') }}";
        var recipientNome  = "{{ old('nome') }}";
        var recipientEmail = "{{ old('email') }}";
        var recipientSite  = "{{ old('site') }}";
        var recipientUf    = "{{ old('uf') }}";
      }

      var modal = $(this);
      //Pega o valor armazenado no recipient e substitui no modal onde o #id = o id do campo no modal
      modal.find('#ided').val(recipientId);
      modal.find('#nomeed').val(recipientNome);
      modal.find('#emailed').val(recipientEmail);
      modal.find('#siteed').val(recipientSite);
      modal.find('#ufed').val(recipientUf);
      $('#emailed').focus();
    });
  </script>

<script>
    //Passa parâmetro para o Modal Excluir Fornecedor
    $('#ModalExcluirFornecedor').on('shown.bs.modal', function (event) {
      if (event.relatedTarget) { // Modal foi aberto por um clique em botão Excluir
        var button = $(event.relatedTarget); //Botão que ativou o Modal
        // CORREÇÃO: button.data('nameex') para button.data('nomeex')
        var recipientId    = button.data('idex');
        var recipientNome  = button.data('nomeex');
        var recipientEmail = button.data('emailex');
        var recipientSite  = button.data('siteex');
        var recipientUf    = button.data('ufex');

        // Remove a div de mensagens de erro dentro do Modal
        const mensagensErro = document.querySelector('#msg-erros-excluir');
        if (mensagensErro) {
            mensagensErro.remove();
        }
      }else{  //Modal aberto automaticamente para reapresentação do Formulário
        // CORREÇÃO: old('name') para old('nome')
        var recipientId    = "{{ old('id') }}";
        var recipientNome  = "{{ old('nome') }}";
        var recipientEmail = "{{ old('email') }}";
        var recipientSite  = "{{ old('site') }}";
        var recipientUf    = "{{ old('uf') }}";
      }

      var modal = $(this);
      //Pega o valor armazenado no recipient e substitui no modal onde o #id = o id do campo no modal
      modal.find('#idex').val(recipientId);
      modal.find('#nomeexshow').val(recipientNome);
      modal.find('#nomeexhidden').val(recipientNome);
      modal.find('#emailexshow').val(recipientEmail);
      modal.find('#emailexhidden').val(recipientEmail);
      modal.find('#siteexshow').val(recipientSite);
      modal.find('#siteexhidden').val(recipientSite);
      modal.find('#ufexshow').val(recipientUf);
      modal.find('#ufexhidden').val(recipientUf);
    });
  </script>

  <script>
    //Limpa o Formulário de Cadastro de Novo Fornecedor, caso tenha informações na Sessão
    document.querySelector('#btnNovoFornecedor').addEventListener('click', function() {
        // Seleciona todos os inputs dentro do modal
        const inputs = document.querySelectorAll('#ModalNovoFornecedor input');
        const mensagensErro = document.querySelector('#msg-erros');

        // Limpa cada input
        inputs.forEach(input => {
          if (input.name != "_token"){ //Preciso disso senão remove o token csrf
              input.value = ''; // Limpa o valor
          }
        });

        // Remove a div de mensagens de erro dentro do Modal
        if (mensagensErro) {
            mensagensErro.remove();
        }
    });
  </script>

  <script>
    //Limpa o Formulário de Pesquisar Fornecedor, caso tenha informações na Sessão
    document.querySelector('#btnPesquisarFornecedor').addEventListener('click', function() {
        // Seleciona todos os inputs dentro do modal
        const inputs = document.querySelectorAll('#ModalPesquisarFornecedor input');
        const mensagensErro = document.querySelector('#msg-erros');

        // Limpa cada input
        inputs.forEach(input => {
          if (input.name != "_token"){ //Preciso disso senão remove o token csrf
              input.value = ''; // Limpa o valor
          }
        });

        // Remove a div de mensagens de erro dentro do Modal
        if (mensagensErro) {
            mensagensErro.remove();
        }
    });
  </script>

{{-- REMOÇÃO: O script abaixo estava quebrado, pois não existe elemento com ID 'EditarFornecedor', e sua funcionalidade já é coberta pelo script que popula o modal de edição. --}}
{{--
<script>
  //Limpa o Formulário de Editar Fornecedor, caso tenha informações na Sessão
  document.querySelector('#EditarFornecedor').addEventListener('click', function() {
    // Seleciona todos os inputs dentro do modal
    const mensagensErro = document.querySelector('#msg-erros-editar');

    // Remove a div de mensagens de erro dentro do Modal
    if (mensagensErro) {
        mensagensErro.remove();
        alert("removeu");
    }

    // Abre o modal
});
</script>
--}}

@endsection