<?php
require_once("config/db_config.php");

// Consulta os ecopontos disponíveis
$ecopoints = $conn->query("SELECT ecopoint_id, name FROM ecopoints");
?>

<form method="POST" action="submit_request.php" class="card p-4">
    <h4 class="mb-3"><i class="bi bi-send-plus"></i> Solicitar Coleta</h4>

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
        <input type="text" name="residue_type" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade (kg):</label>
        <input type="number" name="quantity" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Observações:</label>
        <textarea name="description" class="form-control"></textarea>
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

    <div class="mb-3">
        <label class="form-label">Data da Coleta:</label>
        <input type="date" name="pickup_date" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success w-100">
        <i class="bi bi-check-circle"></i> Enviar Solicitação
    </button>
</form>
