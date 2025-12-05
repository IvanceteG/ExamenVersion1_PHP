<?php
@session_start();


require_once '../config.php';

// Obtener todos los clientes
$stmt = $mysqli->prepare("SELECT id, name, surname, email, rol, date_register FROM clients ORDER BY id ASC");
$stmt->execute();
$result = $stmt->get_result();
$clients = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h2>Gestión de Clientes</h2>
    <a href="addClient.php" class="btn btn-success mb-3">Añadir Cliente</a>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $client['id'] ?></td>
                <td><?= htmlspecialchars($client['name']) ?></td>
                <td><?= htmlspecialchars($client['surname']) ?></td>
                <td><?= htmlspecialchars($client['email']) ?></td>
                <td><?= $client['rol'] ?></td>
                <td><?= $client['date_register'] ?></td>
                <td>
                <a href="editClient.php?id=<?= $client['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="../adminPanel.php" class="btn btn-secondary mt-3">Volver al Panel</a>
</body>
</html>