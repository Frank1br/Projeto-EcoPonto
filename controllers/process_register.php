<?php
require_once(__DIR__ . "/../config/db_config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($nome) || empty($username) || empty($password)) {
        header("Location: ../views/admin_register.php?erro=Preencha todos os campos.");
        exit;
    }

    // Verifica se o usuário já existe
    $stmt = $conn->prepare("SELECT id FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result(); // Necessário para usar num_rows

    if ($stmt->num_rows > 0) {
        header("Location: ../views/admin_register.php?erro=Nome de usuário já está em uso.");
        exit;
    }

    $stmt->close();

    // Criptografar senha
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserir novo admin
    $stmt = $conn->prepare("INSERT INTO admins (nome, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $username, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: ../views/admin_register.php?sucesso=Administrador registrado com sucesso.");
    } else {
        header("Location: ../views/admin_register.php?erro=Erro ao registrar. Tente novamente.");
    }

    $stmt->close();
    $conn->close();
}
?>
