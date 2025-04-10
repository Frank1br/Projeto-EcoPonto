<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: views/admin_login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dashboard do Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4 text-primary">Painel do Administrador</h2>
    <p>Você está logado como <strong>admin</strong>.</p>
    <a href="logout.php" class="btn btn-outline-danger">Sair</a>

    <hr>
    <p>🔧 Aqui você pode gerenciar as solicitações, ver estatísticas, entre outros recursos.</p>
  </div>
</body>
</html>
