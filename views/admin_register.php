<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Registrar Admin - EcoPonto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f5f5f5, #e8f5e9);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      background: white;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
    }

    .btn-primary {
      background-color: #2e7d32;
      border: none;
    }

    .btn-primary:hover {
      background-color: #66bb6a;
    }

    a {
      color: #2e7d32;
    }

    a:hover {
      text-decoration: underline;
    }

    .message {
      margin-top: 10px;
      color: #d32f2f;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h4 class="text-center text-success mb-4">Registro do Administrador</h4>

    <?php if (isset($_GET['erro'])): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['sucesso'])): ?>
      <div class="alert alert-success"><?= htmlspecialchars($_GET['sucesso']) ?></div>
    <?php endif; ?>

    <form method="POST" action="../controllers/process_register.php">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome completo</label>
        <input type="text" class="form-control" name="nome" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Usuário</label>
        <input type="text" class="form-control" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Registrar</button>
    </form>

    <div class="text-center mt-3">
      <a href="admin_login.php">← Já tem uma conta? Login</a>
    </div>
  </div>
</body>
</html>
