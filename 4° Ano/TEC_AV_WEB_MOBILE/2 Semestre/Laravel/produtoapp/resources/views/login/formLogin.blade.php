
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD-Produto Laravel - Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
        <style>
      body {
        background: #f8f9fa;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .login-card {
        max-width: 400px;
        width: 100%;
        padding: 2rem;
        border-radius: 1rem;
        background-color: #fff;
        box-shadow: 10px 16px 24px -2px rgba(0,0,0,0.4);
      }

      .form-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 0.75rem;
        color: #6c757d;
      }

      .form-logo {
        width: 50%;
        height: 50%;
        margin-left: 25%;
        margin-top: -20%;
        margin-bottom:20px;
        border-radius: 3%;
        padding: 0px;
        box-shadow: 6px 6px 10px -2px rgba(0, 0, 0, 0.2);
      }

      .input-with-icon {
        padding-left: 2.5rem;
      }
    </style>
  </head>
  <body>
    <div class="login-card">
    <img  src="imagens/CrudLogo.png" class="form-logo"  alt="CRUD_logo">
      <h4 class="mb-4 text-center">Identifique-se</h4>

      {{-- Mensagens de Erro --}}
      @if(session('erro'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          {{ session('erro') }}
        </div>
      @endif

      {{-- Validação de Campos da Entrada pelo validate do Laravel --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $erro)
              <li>{{ $erro }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('validarLogin') }}" method="post">
        @csrf          
        <div class="mb-3 position-relative">
          <label for="email" class="form-label">Endereço de e-mail</label>
          <i class="bi bi-envelope-fill form-icon"></i>
          <input type="email" class="form-control input-with-icon" id="email" name="email" value="{{ old('email')}}"   autofocus>
        </div>

        <div class="mb-3 position-relative">
          <label for="senha" class="form-label">Senha</label>
          <i class="bi bi-lock-fill form-icon"></i>
          <input type="password" class="form-control input-with-icon" id="senha" name="senha" required>
        </div>

        <button type="submit" class="btn btn-warning w-100">
          <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
        </button>     

        <div class="mt-3 text-center">
          <a href="#">Esqueceu sua senha?</a>
        </div>
    	  <div class="mt-3 text-center text-muted">
		      <small><em>&copy; jlieira-2025</em><small>
	  </div>
	  
</form>

	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
