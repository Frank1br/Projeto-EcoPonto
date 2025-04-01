<?php
// Caminho absoluto para garantir a inclusão correta do arquivo
include __DIR__ . '/config/db_config.php';

// Testando a conexão
if (isset($conn) && $conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}

// Fechar conexão apenas se a variável $conn existir
if (isset($conn)) {
    $conn->close();
}
?>
