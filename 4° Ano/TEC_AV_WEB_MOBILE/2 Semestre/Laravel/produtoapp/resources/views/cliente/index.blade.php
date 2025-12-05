@extends('layout.site')

<!-- Este script ativa o Modal Novo Cliente
  -- quando clicar no button Novo Cliente chama o create do Cliente Controller o qual
  -- coloca o ModalNovoCliente na Sessão e chama esta index. Então, aqui verifico se 
  -- tem essa flag e ativo o Modal para cadastro do novo cliente. Isso foi necessário
  -- para limpar o formulário reapresentado com erro quando o usuário fecha
  -- o modal pelo X da Interface-->
@if ((session()->has('ModalNovoCliente')))
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          var modal = new bootstrap.Modal(document.getElementById("ModalNovoCliente"));
          modal.show();
      });
  </script>
@endif

@if ($errors->any()) <!-- Ativa o Modal em caso de erro de Validação -->
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
      <div class="col-md-8">  
        <h3 class="h3 mt-2">Manutenção de Clientes</h3>
      </div>
      <div class="col-md-2">
        <!-- Button trigger modal Cadastro Novo Cliente-->
        <a href="{{ route('cliente.create')}}"> <button type="button" class="btn btn-outline-primary btn-sm mb-2 mt-2" id='btnNovoCliente'> Novo Cliente </button></a>
      </div>
      <div class="col-md-2">
        <!-- Button para Consultar Cliente-->
        <a href="" class="btn btn-outline-secondary btn-sm mb-2 mt-2" > Consultar</a> 
      </div>            
    </div>
    <span> <!-- Mensagens de Erro e Sucesso -->
          @if (session()->has('sucesso'))
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
            <th class="info">Id</th>
            <th class="info">Nome Cliente</th>
            <th class="info"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($registros as $registro)
          <tr>
            <td>{{ $registro->id }}</td>
            <td>{{ $registro->nome }}</td>
          
            <td style="text-align: right;">
              <!-- Button trigger modal Editar-->
              <button type="button" class="btn btn-outline-info btn-sm mr-2" id="btnEditarCliente" data-bs-toggle="modal" data-bs-target="#ModalEditarCliente" data-ided="{{ $registro->id }}" data-nome="{{ $registro->nome }}" >Editar</button>

              <!-- Button trigger modal Excluir -->
              <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalExcluirCliente" data-idex="{{ $registro->id }}" data-nomeex="{{ $registro->nome }}">Excluir</button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <div class="mx-auto col-md-3">
      {{ $registros->links() }} <!-- Exibe os links de paginação -->
    </div>

    <!-- Modal Novo Cliente -->
    <div class="modal fade" id="ModalNovoCliente">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalNovoCliente">Cadastrar Novo Cliente</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formNovoCliente" action="{{ route('cliente.store') }}"  method="post">
            @csrf
             <div class="modal-body">
                @if ($errors->any())
                    <div id="msg-erros" class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                <div class="form-group">
                  <label for="nome" class="col-form-label">Nome Cliente</label>
                  <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}" required>
                </div>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" id="btnConfirmar" class="btn btn-outline-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- Fim ModalNovoCliente -->

    <!-- Modal Editar Cliente -->
    <div class="modal fade" id="ModalEditarCliente">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalEditarCliente">Editar Cadastro de Cliente</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  id="formEditarCliente" method="post">  
            @csrf
            @method('PUT')
            <div class="modal-body">
              @if ($errors->any())
                <div id="msg-erros-editar" class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif                   
            
                <input type="hidden" name="id" id="ided">

                <div class="form-group">
                  <label for="nome" class="col-form-label">Nome Cliente</label>
                  <input type="text" class="form-control" name="nome" id="nomeed" value="{{ old('nome') }}" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            </div>
         </form>
        </div>
      </div>
    </div>  <!--Fim ModalEditarCliente -->    

	  <!-- Modal Excluir Cliente -->
    <div class="modal fade" id="ModalExcluirCliente" tabindex="-1" aria-labelledby="ModalExcluirClienteLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalExcluirClienteLabel">Confirma Exclusão do Cliente?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="formExcluirCliente" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-body">
              @if ($errors->any())
                <div id="msg-erros-excluir" class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif              

              <input type="hidden" name="id" id="idex">

              <div class="form-group mb-3">
                <label for="nomeexshow" class="col-form-label">Nome Cliente</label>
                <input type="text" class="form-control" id="nomeexshow" name="nome" readonly>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>                    
              <button type="submit" id="btnExcluir" class="btn btn-outline-danger">Confirmar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <script>
    //Aplica autofocus no campo Nome do Modal Novo Cliente
    const modal = document.getElementById('ModalNovoCliente');
    modal.addEventListener('shown.bs.modal', function () {
      document.getElementById('nome').focus();
    });
  </script>

  <script>
    //Passa parâmetro para o Modal Editar Cliente
    $('#ModalEditarCliente').on('shown.bs.modal', function (event) {      
      if (event.relatedTarget) { // Modal foi aberto por um clique em botão Editar  
        var button = $(event.relatedTarget); //Botão que ativou o Modal
        var recipientid      = button.data('ided');
        var recipientNome       = button.data('nome');
        
        // Remove a div de mensagens de erro dentro do Modal
        const mensagensErro = document.querySelector('#msg-erros-editar');
        if (mensagensErro) {
            mensagensErro.remove();
        }
      }else{
        var recipientid         = "{{ old('id') }}";
        var recipientNome       = "{{ old('nome') }}";
      }
      //alert(recipientid);
      //alert(recipientNome);
      var modal = $(this);
      //Pega o valor armazenado no recipient e substitui no modal onde o #id = o id do campo no modal 
      modal.find('#ided').val(recipientid);
      modal.find('#nomeed').val(recipientNome);

      // Monta a URL da rota update substituindo o :id
      var action = "{{ route('cliente.update', ':id') }}";
      action = action.replace(':id', recipientid);
      modal.find('form').attr('action', action);

      $('#nomeed').focus();
    });
  </script>

  <script>
    //Passa parâmetro para o Modal Excluir Cliente
    $('#ModalExcluirCliente').on('shown.bs.modal', function (event) {      
      if (event.relatedTarget) { // Modal foi aberto por um clique em botão Excluir 
        var button = $(event.relatedTarget); //Botão que ativou o Modal
        var recipientid      = button.data('idex');
        var recipientNome       = button.data('nomeex');
        
        // Remove a div de mensagens de erro dentro do Modal
        const mensagensErro = document.querySelector('#msg-erros-excluir');
        if (mensagensErro) {
            mensagensErro.remove();
        }
      }else{  //Modal aberto automaticamente para reapresentação do Formulário
        var recipientid         = "{{ old('id') }}";
        var recipientNome       = "{{ old('nome') }}";
      }
      //alert(recipientid);
      //alert(recipientNome);
      var modal = $(this);
      //Pega o valor armazenado no recipient e substitui no modal onde o #id = o id do campo no modal 
      modal.find('#idex').val(recipientid);
      modal.find('#nomeexshow').val(recipientNome);

      // Monta a URL da rota destroy substituindo o :id
      var action = "{{ route('cliente.destroy', ':id') }}";
      action = action.replace(':id', recipientid);
      modal.find('form').attr('action', action);

    });
  </script>
@endsection    
