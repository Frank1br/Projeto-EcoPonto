<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - EcoPonto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2d9d5c8a6.js" crossorigin="anonymous"></script>
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #f5f5f5, #e8f5e9);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(14px);
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.25);
      color: #1b5e20;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.5);
      border: none;
      border-radius: 10px;
    }

    .form-control:focus {
      box-shadow: none;
      border: 2px solid #66bb6a;
      background-color: rgba(255, 255, 255, 0.8);
    }

    .login-icon {
      font-size: 2.5rem;
      color: #2e7d32;
    }

    .btn-primary {
      background-color: #2e7d32;
      border: none;
      border-radius: 10px;
    }

    .btn-primary:hover {
      background-color: #66bb6a;
    }

    .error-message {
      background: rgba(244, 67, 54, 0.1);
      color: #c62828;
      border-radius: 10px;
      padding: 0.75rem;
      margin-bottom: 1rem;
      text-align: center;
    }

    a {
      text-decoration: none;
      color: #2e7d32;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="glass-card text-center">
          <div class="mb-4">
            <i class="fas fa-user-shield login-icon"></i>
            <h3 class="mt-2">Login do Administrador</h3>
            <p class="text-muted small">Acesso ao sistema EcoPonto</p>
          </div>

          <?php if (!empty($_SESSION['login_error'])): ?>
            <div class="error-message">
              <?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
            </div>
          <?php endif; ?>

          <form method="POST" action="../process_login.php">
            <div class="mb-3 text-start">
              <label for="username" class="form-label">Usuário</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
              <label for="password" class="form-label">Senha</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
          </form>

          <div class="mt-3">
            <a href="../index.php">← Voltar para o início</a> <br>
            <a href="admin_register.php">← Crie uma conta admin</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
