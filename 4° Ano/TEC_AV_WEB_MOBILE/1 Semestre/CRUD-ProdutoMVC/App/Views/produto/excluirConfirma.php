<main role="main" class="flex-shrink-0">
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h1 class="mt-2">Exclusão de Produto</h1>
        <form action="<?php echo 'http://'.APP_HOST.'/produto/excluir/';?>" method="post" id="formExcluirProduto">
          <input type="hidden" name="id" value="<?php echo $viewVar['produto']->getId();?>">
            <div class="card text-white bg-danger mb-3" style="max-width: 22 rem;">
              <div class="card-header">Confirmação da Exclusão do Produto</div>
              <div class="card-body">
                <h5 class="card-title">Excluir?</h5>
                  Confirma exclusão do produto: <?php echo $viewVar['produto']->getNome();?> ?
                <button type="submit" class="btn btn-primary btn-sm mt2">Confirmar</button>
                <a href="<?php echo 'http://'.APP_HOST.'/produto/listar/';?>" class="btn btn-info btn-sm mt2">Cancelar</a>
              </div>
            </div>
        </form>
      </div>
    <div class=" col-md-3"></div>
    </div>
  </div>
</main>

