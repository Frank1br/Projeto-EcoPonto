<?php
require_once(__DIR__ . "/../config/db_config.php");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e0f7fa, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-custom {
            background: #ffffff;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #26a69a;
            box-shadow: 0 0 0 0.25rem rgba(38, 166, 154, 0.25);
        }
        .table thead {
            background-color: #26a69a;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f8f9;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0"><i class="bi bi-recycle me-2 text-success"></i>Solicitações de Coleta</h2>
                <a href="../index.php" class="btn btn-outline-secondary">
                    <i class="bi bi-speedometer2"></i> Pagina Inicial
                </a>
            </div>

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
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-funnel-fill me-1"></i>Filtrar
                    </button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered align-middle">
                    <thead class="text-center">
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
                            <td class="text-center"><?= $row['request_id'] ?></td>
                            <td><?= htmlspecialchars($row['user_name']) ?></td>
                            <td><?= htmlspecialchars($row['residue_name']) ?></td>
                            <td><?= htmlspecialchars($row['ecopoint_name']) ?></td>
                            <td class="text-center"><?= date("d/m/Y", strtotime($row['pickup_date'])) ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
