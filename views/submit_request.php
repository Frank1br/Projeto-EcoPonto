<?php
require_once(__DIR__ . "/../config/db_config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare("INSERT INTO collection_requests (user_id, residue_id, ecopoint_id, pickup_date)
        VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $_POST['user_id'], $_POST['residue_id'], $_POST['ecopoint_id'], $_POST['request_date']);

    if ($stmt->execute()) {
        header("Location: get_requests.php");
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}
?>
