<?php
@session_start();
require_once '../config.php';

$stmt = $mysqli->prepare("SELECT * FROM vehicles ORDER BY id ASC");
$stmt->execute();
$result = $stmt->get_result();
$vehicles = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <h1 class="mb-4">Gestión de Vehículos</h1>

    <a href="addVehicle.php" class="btn btn-success mb-3">+ Añadir Vehículo</a>
    <a href="../adminPanel.php" class="btn btn-success mb-3"><- Volver al panel de Administrador</a>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vehicles as $v): ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= htmlspecialchars($v['model']) ?></td>
                <td><?= htmlspecialchars($v['matricula']) ?></td>
                <td>
                    <?php if ($v['estat'] === 'disponible'): ?>
                        <span class="badge bg-success">Disponible</span>
                    <?php else: ?>
                        <span class="badge bg-danger">No disponible</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="editVehicle.php?id=<?= $v['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="deleteVehicle.php?id=<?= $v['id'] ?>" 
                       onclick="return confirm('¿Seguro que quieres eliminar este vehículo?');"
                       class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>

</body>
</html>