<?php include 'layout.php'; ?>

<h2>Solicitação de Coleta</h2>
<form action="/src/request_handler.php" method="post">
    <label for="residuo_id">Tipo de resíduo:</label>
    <select name="residuo_id" required>
        <option value="1">Papel</option>
        <option value="2">Plástico</option>
        <option value="3">Vidro</option>
        <option value="4">Metal</option>
    </select><br><br>

    <label for="ecoponto_id">Ecoponto:</label>
    <select name="ecoponto_id" required>
        <option value="1">Ecoponto Central</option>
        <option value="2">Ecoponto Zona Sul</option>
    </select><br><br>

    <button type="submit">Enviar Solicitação</button>
</form>
</main>
<footer>
    <p>&copy; 2025 EcoPonto</p>
</footer>
</body>
</html>


<?php include 'layout.php'; ?>
