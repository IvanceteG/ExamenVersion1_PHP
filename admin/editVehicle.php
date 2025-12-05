<?php
@session_start();

require_once '../config.php';

$msg = "";

if (!isset($_GET['id'])) {
    header("Location: vehicles.php");
    exit();
}

$vehicle_id = (int) $_GET['id'];

$stmt = $mysqli->prepare("SELECT model, matricula FROM vehicles WHERE id = ?");
$stmt->bind_param("i", $vehicle_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    $stmt->close();
    $mysqli->close();
    die("Vehículo no encontrado.");
}

$vehicle = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $model = $_POST["model"];
    $matricula = $_POST["matricula"];

    $stmt = $mysqli->prepare("UPDATE vehicles SET model = ?, matricula = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("ssi", $model, $matricula, $vehicle_id);

        if ($stmt->execute()) {
            $msg = "Coche actualizado correctamente.";
            $vehicle['model'] = $model;
            $vehicle['matricula'] = $matricula;
        } else {
            $msg = "Error al actualizar el coche: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $msg = "Error en la preparación de la consulta: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar coche</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h2>Editar coche</h2>

    <?php if ($msg): ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <input class="form-control mb-3" placeholder="Modelo" name="model" value="<?= htmlspecialchars($vehicle['model']) ?>" required>
        <input class="form-control mb-3" placeholder="Matrícula" name="matricula" value="<?= htmlspecialchars($vehicle['matricula']) ?>" required>
        <button class="btn btn-primary">Guardar cambios</button>
    </form>

    <a href="vehicles.php" class="btn btn-secondary mt-3">Volver a la lista de coches</a>
</body>
</html>