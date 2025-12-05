<?php
@session_start();
if(!isset($_SESSION['user_rol']) || $_SESSION['user_rol']!=='client') exit("No tens permisos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Client Panel</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container text-center">
    <div class="container-card">
        <h2>Benvingut, <?= $_SESSION['user_name'] ?></h2>
        <a href="client/clientLloguers.php" class="btn btn-primary btn-custom">Els meus lloguers</a>
        <a href="client/clientDisponibles.php" class="btn btn-success btn-custom">Vehicles disponibles</a>
        <a href="logout.php" class="btn btn-danger btn-custom">Cerrar Sesión</a>
    </div>
</div>
</body>
</html>