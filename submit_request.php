<?php
require_once("config/db_config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Coleta os dados do formulário
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $residue_type = $_POST['residue_type'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $ecopoint_id = $_POST['ecopoint_id'];
    $pickup_date = $_POST['pickup_date'];

    // 1. Verifica se o usuário já existe
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $stmt->store_result();
    $user_id = null;

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id);
        $stmt->fetch();
    } else {
        // Usuário não existe, insere novo
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email) VALUES (?, ?)");
        $stmt->bind_param("ss", $user_name, $user_email);
        $stmt->execute();
        $user_id = $stmt->insert_id;
    }
    $stmt->close();

    // 2. Insere o resíduo
    $stmt = $conn->prepare("INSERT INTO residues (type, quantity, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $residue_type, $quantity, $description);
    $stmt->execute();
    $residue_id = $stmt->insert_id;
    $stmt->close();

    // 3. Cria a solicitação de coleta
    $stmt = $conn->prepare("INSERT INTO collection_requests (user_id, residue_id, ecopoint_id, pickup_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $user_id, $residue_id, $ecopoint_id, $pickup_date);

    if ($stmt->execute()) {
        header("Location: get_requests.php?success=1");
        exit();
    } else {
        echo "Erro ao registrar solicitação: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
