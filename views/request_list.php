<div class="card p-4 mt-4">
    <h4 class="mb-3"><i class="bi bi-card-list"></i> Solicitações</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>ID Resíduo</th>
                <th>ID EcoPonto</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $req): ?>
                <tr>
                    <td><?= htmlspecialchars($req['user_name']) ?></td>
                    <td><?= $req['residue_id'] ?></td>
                    <td><?= $req['ecopoint_id'] ?></td>
                    <td><?= $req['request_date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
