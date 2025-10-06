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
        <h3 class="h3 mt-2">Manutenção de Usuários do Sistema</h3>
      </div>
      <div class="col-md-3">
        <!-- Button trigger modal Cadastro Novo Usuário-->
        <button type="button" class="btn btn-outline-primary btn-sm mb-2 mt-2" id='btnNovoUsuario' data-bs-toggle="modal" data-bs-target="#ModalNovoUsuario" > Novo Usuário </button> 
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
            <th class="info">Nome Completo</th>
            <th class="info">Email(Login)</th>
            <th class="info">Tipo de Permissão</th>
            <th class="info"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($registros as $registro)
          <tr>
            <td>{{ $registro->name }}</td>
            <td>{{ $registro->email }}</td>
            <td>{{ $registro->permissao }}</td>
          
            <td style="text-align: right;">
              <!-- Button trigger modal Editar-->
              <button type="button" class="btn btn-outline-info btn-sm mr-2" id="btnEditarUsuario" data-bs-toggle="modal" data-bs-target="#ModalEditarUsuario" data-ided="{{ $registro->id }}" data-name="{{ $registro->name }}" data-email="{{ $registro->email }}" data-permissao="{{ $registro->permissao }}">Editar</button>

              <!-- Button trigger modal RessetarSenha-->
              <button type="button" class="btn btn-outline-warning btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#ModalRessetarSenha" data-idrs="{{ $registro->id }}" data-namers="{{ $registro->name }}" data-emailrs="{{ $registro->email }}">Ressetar Senha</button>

              <!-- Button trigger modal Excluir-->
              <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalExcluirUsuario" data-idex="{{ $registro->id }}" data-nameex="{{ $registro->name }}" data-emailex="{{ $registro->email }}">Excluir</button>                        
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <!-- Modal Novo Usuário -->
    <div class="modal fade" id="ModalNovoUsuario">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalNovoUsuario">Cadastrar Novo Usuário</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="formNovoUsuario" action="/user/salvarnovo"  method="post">
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
                  <label for="email" class="col-form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                  <label for="name" class="col-form-label">Nome Completo</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                  <label for="password" class="col-form-label">Senha</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="{{ session('Modal') === 'ModalNovoUsuario'? 'Por segurança, digite a senha novamente.' : 'Digite a senha' }}" required>
                </div>                                
                <div class="form-group">
                  <label for="permissao" class="col-form-label">Tipo de Permissão</label>
                  <select class="form-control" name="permissao" id="permissao">
                    <option value="Selecione" {{ old('permissao') == 'Selecione' ? 'selected' : '' }} >Selecione</option>
                    <option value="Admin" {{ old('permissao') == 'Admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="Normal" {{ old('permissao') == 'Normal' ? 'selected' : '' }}>Normal</option>
                    <option value="Leitura" {{ old('permissao') == 'Leitura' ? 'selected' : '' }}>Somente Leitura</option>
                  </select>
                </div>                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" id="btnConfirmar" class="btn btn-outline-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- Fim ModalNovoUsuario -->

    <!-- Modal Editar Usuário -->
    <div class="modal fade" id="ModalEditarUsuario">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalEditarUsuario">Editar Cadastro do Usuário</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  id="formEditarUsuario" action="/user/salvarEditado" method="post">  
            @csrf
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
            
              <div class="form-group">
                <input type="hidden" name="id" id="ided">
              </div>
              <div class="form-group">
                <label for="emailed" class="col-form-label">Email</label>
                <input type="text" class="form-control" name="email" id="emailed"  required>
              </div>
              <div class="form-group">
                <label for="nameed" class="col-form-label">Nome Completo</label>
                <input type="text" class="form-control" name="name" id="nameed" required>
              </div>
              <div class="form-group">
                <label for="permissaoed" class="col-form-label">Tipo de Permissão</label>
                <select class="form-control" name="permissao" id="permissaoed">
                  <option value="Selecione">Selecione</option>
                  <option value="Admin">Administrador</option>
                  <option value="Normal">Normal</option>
                  <option value="Leitura">Somente Leitura</option>
                </select>
              </div>                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            </div>
        </form>
        </div>
      </div>
    </div>  <!--Fim ModalEditarUsuario -->

    <!-- Modal Ressetar Senha Usuário -->
    <div class="modal fade" id="ModalRessetarSenha">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalRessetarSenha">Ressetar a Senha do Usuário</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </div>
          <form  id="formRessetarSenha" action="/user/atualizarSenha"  method="post">
            @csrf
            <div class="modal-body">
              @if ($errors->any())
                <div id="msg-erros-ressetar-senha" class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif

              <div class="form-group">
                <input type="hidden" name="id" id="idrs">
              </div>              
              <div class="form-group">
                <label for="emailrs" class="col-form-label">Email</label>
                <input type="text" class="form-control" id="emailrsshow" readonly disabled>
                <input type="hidden" class="form-control" name="email" id="emailrshidden">
              </div>
              <div class="form-group">
                <label for="namers" class="col-form-label">Nome Completo</label>
                <input type="text" class="form-control" id="namersshow" readonly disabled>
                <input type="hidden" class="form-control" name="name" id="namershidden">
              </div>              
              <div class="form-group">
                <label for="senhars" class="col-form-label">Senha Provisória</label>
                <input type="password" class="form-control" name="password" id="senhars" value="" >
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-danger">Confirmar</button>
            </div>
        </form>
        </div>
      </div>
    </div>  <!--Fim ModalRessetarSenha -->

    <!-- Modal Excluir Usuário -->
    <div class="modal fade" id="ModalExcluirUsuario">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Confirma Exclusão do Usuário?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </div>
          <form  id="formExcluirUsuario" action="/user/excluir" method="post">
            @csrf
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
              <div class="form-group">
                <input type="hidden" name="id" id="idex">
              </div>              
              <div class="form-group">
                <label for="emailrs" class="col-form-label">Email</label>
                <input type="text" class="form-control" id="emailexshow" readonly disabled>
                <input type="hidden" class="form-control" name="email" id="emailexhidden">
              </div>
              <div class="form-group">
                <label for="namers" class="col-form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nameexshow" readonly disabled>
                <input type="hidden" class="form-control" name="name" id="nameexhidden">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>                    
              <button type="submit" id="btnExcluir" name="btnExcluir" value="btnExcluir" class="btn btn-outline-danger">Confirmar</button>
            </div>
          </form>
        </div>
      </div>
    </div> <!--Fim ModalExcluirUsuario -->
  </div>

  
  <script>
    //Aplica autofocus no campo Email do Modal Novo Usuário
    const modal = document.getElementById('ModalNovoUsuario');
    modal.addEventListener('shown.bs.modal', function () {
      document.getElementById('email').focus();
    });
  </script>

  <script>
    //Passa parâmetro para o Modal Editar Usuário
    $('#ModalEditarUsuario').on('shown.bs.modal', function (event) {      
      if (event.relatedTarget) { // Modal foi aberto por um clique em botão Editar  
        var button = $(event.relatedTarget); //Botão que ativou o Modal
        var recipientid      = button.data('ided');
        var recipientName       = button.data('name');
        var recipientEmail      = button.data('email');
        var recipientPermissao  = button.data('permissao');   
        
        // Remove a div de mensagens de erro dentro do Modal
        const mensagensErro = document.querySelector('#msg-erros-editar');
        if (mensagensErro) {
            mensagensErro.remove();
        }
      }else{
        var recipientid         = "{{ old('id') }}";
        var recipientName       = "{{ old('name') }}";
        var recipientEmail      = "{{ old('email') }}";
        var recipientPermissao  = "{{ old('permissao') }}";
      }
      //alert(recipientid);
      //alert(recipientName);
      var modal = $(this);
      //Pega o valor armazenado no recipient e substitui no modal onde o #id = o id do campo no modal 
      modal.find('#ided').val(recipientid);
      modal.find('#nameed').val(recipientName);
      modal.find('#emailed').val(recipientEmail);
      modal.find('#permissaoed').val(recipientPermissao);
      $('#emailed').focus();
    });
  </script>

<script>
    //Passa parâmetro para o Modal Ressetar Senha
    $('#ModalRessetarSenha').on('shown.bs.modal', function (event) {      
      if (event.relatedTarget) { // Modal foi aberto por um clique em botão Ressetar Senha  
        var button = $(event.relatedTarget); //Botão que ativou o Modal
        var recipientid      = button.data('idrs');
        var recipientName       = button.data('namers');
        var recipientEmail      = button.data('emailrs');
        
        // Remove a div de mensagens de erro dentro do Modal
        const mensagensErro = document.querySelector('#msg-erros-ressetar-senha');
        if (mensagensErro) {
            mensagensErro.remove();
        }
      }else{  //Modal aberto automaticamente para reapresentação do Formulário
        var recipientid         = "{{ old('id') }}";
        var recipientName       = "{{ old('name') }}";
        var recipientEmail      = "{{ old('email') }}";
      }
      //alert(recipientid);
      //alert(recipientName);
      var modal = $(this);
      //Pega o valor armazenado no recipient e substitui no modal onde o #id = o id do campo no modal 
      modal.find('#idrs').val(recipientid);
      modal.find('#namersshow').val(recipientName);
      modal.find('#namershidden').val(recipientName);
      modal.find('#emailrsshow').val(recipientEmail);
      modal.find('#emailrshidden').val(recipientEmail);
      //Coloca o foco no campo Senha
      const modalRessetarSenha = document.querySelector('#senhars');
      modalRessetarSenha.focus();
    });
  </script>

<script>
    //Passa parâmetro para o Modal Excluir Usuario
    $('#ModalExcluirUsuario').on('shown.bs.modal', function (event) {      
      if (event.relatedTarget) { // Modal foi aberto por um clique em botão Excluir 
        var button = $(event.relatedTarget); //Botão que ativou o Modal
        var recipientid      = button.data('idex');
        var recipientName       = button.data('nameex');
        var recipientEmail      = button.data('emailex');
        
        // Remove a div de mensagens de erro dentro do Modal
        const mensagensErro = document.querySelector('#msg-erros-excluir');
        if (mensagensErro) {
            mensagensErro.remove();
        }
      }else{  //Modal aberto automaticamente para reapresentação do Formulário
        var recipientid         = "{{ old('id') }}";
        var recipientName       = "{{ old('name') }}";
        var recipientEmail      = "{{ old('email') }}";
      }
      //alert(recipientid);
      //alert(recipientName);
      var modal = $(this);
      //Pega o valor armazenado no recipient e substitui no modal onde o #id = o id do campo no modal 
      modal.find('#idex').val(recipientid);
      modal.find('#nameexshow').val(recipientName);
      modal.find('#nameexhidden').val(recipientName);
      modal.find('#emailexshow').val(recipientEmail);
      modal.find('#emailexhidden').val(recipientEmail);
    });
  </script>

  <script>
    //Limpa o Formulário de Cadastro de Novo Usuário, caso tenha informações na Sessão
    document.querySelector('#btnNovoUsuario').addEventListener('click', function() {
        // Seleciona todos os inputs dentro do modal
        const inputs = document.querySelectorAll('#ModalNovoUsuario input');
        const select = document.querySelector('#permissao');
        const mensagensErro = document.querySelector('#msg-erros');
        
        // Limpa cada input
        inputs.forEach(input => {
          if (input.name != "_token"){ //Preciso disso senão remove o token csrf
              input.value = ''; // Limpa o valor
          }
          if (input.name == "password"){//Troca o placeholder do campo de senha
              input.placeholder = "Digite a Senha";
          }
        });
        
        // Remove a div de mensagens de erro dentro do Modal
        if (mensagensErro) {
            mensagensErro.remove();
        }
        
        //Seta o select da Permissão para Selecione
        select.value = 'Selecione';

        // Abre o modal
    });
  </script>

<script>
  //Limpa o Formulário de Editar Usuário, caso tenha informações na Sessão
  document.querySelector('#EditarUsuario').addEventListener('click', function() {
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

@endsection
