<?php
@session_start();

require_once '../config.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $model = $_POST["model"];
    $matricula = $_POST["matricula"];

    $stmt = $mysqli->prepare("INSERT INTO vehicles (model, matricula) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $model, $matricula);

        if ($stmt->execute()) {
            $msg = "Coche añadido correctamente.";
        } else {
            $msg = "Error al añadir el coche: " . $stmt->error;
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
    <title>Añadir coche</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h2>Añadir coche</h2>

    <?php if ($msg): ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <input class="form-control mb-3" placeholder="Modelo" name="model" required>
        <input class="form-control mb-3" placeholder="Matrícula" name="matricula" required>
        <button class="btn btn-primary">Guardar</button>
    </form>

    <a href="vehicles.php" class="btn btn-secondary mt-3">Volver a la lista de coches</a>
</body>
</html>