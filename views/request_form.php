<?php
require_once(__DIR__ . "/../config/db_config.php");


// Consulta os ecopontos disponíveis
$ecopoints = $conn->query("SELECT ecopoint_id, name FROM ecopoints");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Coleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #26a69a;
            --primary-hover: #1e8e86;
            --bg-light: #f0fdfc;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container {
            max-width: 700px;
            margin: 50px auto;
        }

        .card-custom {
            background-color: #fff;
            border: none;
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(38, 166, 154, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        h4 {
            color: var(--primary-color);
        }

        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <form method="POST" action="submit_request.php" class="card card-custom">
        <h4 class="mb-4 text-center">
            <i class="bi bi-send-plus me-2"></i> Solicitação de Coleta
        </h4>

        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail:</label>
            <input type="email" name="user_email" class="form-control" required>
        </div>

        <div class="mb-3">
    <label class="form-label">Tipo de Resíduo:</label>
    <select name="residue_type" class="form-select" required>
        <option value="" disabled selected>Selecione o tipo de resíduo</option>
        <option value="Eletrônicos">Eletrônicos</option>
        <option value="Pilhas e Baterias">Pilhas e Baterias</option>
        <option value="Óleo de Cozinha">Óleo de Cozinha</option>
        <option value="Papel e Papelão">Papel e Papelão</option>
        <option value="Plásticos">Plásticos</option>
        <option value="Metais">Metais</option>
        <option value="Vidros">Vidros</option>
        <option value="Entulho (pequena quantidade)">Entulho (pequena quantidade)</option>
        <option value="Móveis velhos">Móveis velhos</option>
        <option value="Outros">Outros</option>
    </select>
</div>


        <div class="mb-3">
            <label class="form-label">Quantidade (kg):</label>
            <input type="number" name="quantity" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Observações:</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Informações adicionais sobre o resíduo..."></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">EcoPonto:</label>
            <select name="ecopoint_id" class="form-select" required>
                <option value="" disabled selected>Selecione um EcoPonto</option>
                <?php while ($row = $ecopoints->fetch_assoc()): ?>
                    <option value="<?= $row['ecopoint_id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label">Data da Coleta:</label>
            <input type="date" name="pickup_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-check-circle me-1"></i> Enviar Solicitação
        </button>
    </form>
</div>

</body>
</html>


