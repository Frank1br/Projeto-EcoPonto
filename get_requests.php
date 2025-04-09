<?php
require_once("config/db_config.php");

// Inicializa filtros
$filters = [];
$params = [];
$types = "";

// Filtros por GET
if (!empty($_GET['user_name'])) {
    $filters[] = "u.name LIKE ?";
    $params[] = "%" . $_GET['user_name'] . "%";
    $types .= "s";
}

if (!empty($_GET['residue_id'])) {
    $filters[] = "r.residue_id = ?";
    $params[] = $_GET['residue_id'];
    $types .= "i";
}

if (!empty($_GET['ecopoint_id'])) {
    $filters[] = "e.ecopoint_id = ?";
    $params[] = $_GET['ecopoint_id'];
    $types .= "i";
}

if (!empty($_GET['request_date'])) {
    $filters[] = "cr.pickup_date = ?";
    $params[] = $_GET['request_date'];
    $types .= "s";
}

// Monta a query com filtros
$sql = "
    SELECT cr.request_id, u.name AS user_name, r.name AS residue_name, 
           e.name AS ecopoint_name, cr.pickup_date 
    FROM collection_requests cr
    JOIN users u ON cr.user_id = u.user_id
    JOIN residues r ON cr.residue_id = r.residue_id
    JOIN ecopoints e ON cr.ecopoint_id = e.ecopoint_id
";

if (!empty($filters)) {
    $sql .= " WHERE " . implode(" AND ", $filters);
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitações de Coleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="mb-4">Solicitações de Coleta</h2>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="user_name" class="form-control" placeholder="Nome do Usuário" value="<?= $_GET['user_name'] ?? '' ?>">
        </div>
        <div class="col-md-2">
            <input type="number" name="residue_id" class="form-control" placeholder="ID Resíduo" value="<?= $_GET['residue_id'] ?? '' ?>">
        </div>
        <div class="col-md-2">
            <input type="number" name="ecopoint_id" class="form-control" placeholder="ID EcoPonto" value="<?= $_GET['ecopoint_id'] ?? '' ?>">
        </div>
        <div class="col-md-3">
            <input type="date" name="request_date" class="form-control" value="<?= $_GET['request_date'] ?? '' ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Usuário</th>
                <th>Resíduo</th>
                <th>EcoPonto</th>
                <th>Data da Coleta</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['request_id'] ?></td>
                <td><?= htmlspecialchars($row['user_name']) ?></td>
                <td><?= htmlspecialchars($row['residue_name']) ?></td>
                <td><?= htmlspecialchars($row['ecopoint_name']) ?></td>
                <td><?= date("d/m/Y", strtotime($row['pickup_date'])) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
