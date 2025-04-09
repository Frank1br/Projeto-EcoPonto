<?php
// admin_dashboard.php
require_once("config/db_config.php");

// Buscar todas as solicitações de coleta
$sql = "SELECT r.request_id, u.name, u.email, r.residue_type, r.quantity, r.description, e.name AS ecopoint_name, r.pickup_date
        FROM collection_requests r
        JOIN users u ON r.user_id = u.user_id
        JOIN ecopoints e ON r.ecopoint_id = e.ecopoint_id
        ORDER BY r.pickup_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Painel Administrativo - Solicitações de Coleta</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Email</th>
                <th>Resíduo</th>
                <th>Quantidade (kg)</th>
                <th>Observações</th>
                <th>EcoPonto</th>
                <th>Data da Coleta</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['request_id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['residue_type'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['ecopoint_name'] ?></td>
                <td><?= date("d/m/Y", strtotime($row['pickup_date'])) ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
