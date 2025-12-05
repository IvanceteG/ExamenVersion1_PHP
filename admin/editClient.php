<?php
@session_start();


require_once '../config.php';

$msg = "";

if (!isset($_GET['id'])) {
    header("Location: clients.php");
    exit();
}

$client_id = (int) $_GET['id'];

$stmt = $mysqli->prepare("SELECT name, surname, email, rol FROM clients WHERE id = ?");
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    $stmt->close();
    $mysqli->close();
    die("Cliente no encontrado.");
}

$client = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $rol = $_POST["rol"];

    $stmt = $mysqli->prepare("UPDATE clients SET name = ?, surname = ?, email = ?, rol = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("ssssi", $name, $surname, $email, $rol, $client_id);

        if ($stmt->execute()) {
            $msg = "Cliente actualizado correctamente.";
            $client['name'] = $name;
            $client['surname'] = $surname;
            $client['email'] = $email;
            $client['rol'] = $rol;
        } else {
            $msg = "Error al actualizar el cliente: " . $stmt->error;
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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h2>Editar Cliente</h2>

    <?php if ($msg): ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <input class="form-control mb-3" placeholder="Nombre" name="name" value="<?= htmlspecialchars($client['name']) ?>" required>
        <input class="form-control mb-3" placeholder="Apellido" name="surname" value="<?= htmlspecialchars($client['surname']) ?>" required>
        <input class="form-control mb-3" placeholder="Email" name="email" value="<?= htmlspecialchars($client['email']) ?>" required>
        <select class="form-control mb-3" name="rol" required>
            <option value="user" <?= $client['rol'] === 'user' ? 'selected' : '' ?>>Usuario</option>
            <option value="admin" <?= $client['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
        </select>
        <button class="btn btn-primary">Guardar cambios</button>
    </form>

    <a href="adminClients.php" class="btn btn-secondary mt-3">Volver a la lista de clientes</a>
</body>
</html>