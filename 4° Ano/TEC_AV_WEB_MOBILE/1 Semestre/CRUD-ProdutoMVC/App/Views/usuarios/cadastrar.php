<main role="main" class="flex-shrink-0">
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="mt-2">Cadastro de Usuários</h1>
            <?php
              //Mensagens de Erro ou Sucesso na execução das funções
              echo $Sessao::retornaMensagem();
              $Sessao::limpaMensagem();
            ?>
            <form action="<?php echo 'http://'.APP_HOST.'/usuarios/salvar/novo';?>" method="post" id="formCadastro">
              <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" value="<?php if (isset($viewVar['usuario'])) echo $viewVar['usuario']->getLogin();?>" required>
              </div>
              <div class="form-group">
                <label for="nome">Nome do Usuário</label>
                <input type="text" class="form-control" name="nome" value="<?php if (isset($viewVar['usuario'])) echo $viewVar['usuario']->getNome();?>" required>
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" value="<?php if (isset($viewVar['usuario'])) echo $viewVar['usuario']->getSenha();?>" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset($viewVar['usuario'])) echo $viewVar['usuario']->getEmail();?>" required>
              </div>
              <div class="form-group">
                <label for="permissao">Permissão</label>
                <?php $permissao = isset($viewVar['usuario']) ? $viewVar['usuario']->getPermissao() : ''; ?>
                <select class="form-control" name="permissao" required>
                  <option value="Admin" <?php echo $permissao === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                  <option value="Normal" <?php echo $permissao === 'Normal' ? 'selected' : ''; ?>>Normal</option>
                  <option value="Leitura" <?php echo $permissao === 'Leitura' ? 'selected' : ''; ?>>Leitura</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
  </div>
</main>

