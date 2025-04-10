<?php
session_start();
require_once("config/db_config.php"); // Inclui conexão com o banco

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $_SESSION['login_error'] = "Preencha todos os campos.";
    header('Location: /Projeto-EcoPonto/views/admin_login.php');

    exit();
}

// Buscar admin no banco
$stmt = $conn->prepare("SELECT id, nome, password FROM admins WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();

    // Verifica a senha com hash
    if (password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_nome'] = $admin['nome'];
        $_SESSION['admin_id'] = $admin['id'];

        header("Location: ../views/admin_dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Senha incorreta.";
    }
} else {
    $_SESSION['login_error'] = "Usuário não encontrado.";
}

header('Location: ../views/admin_login.php');
exit();
