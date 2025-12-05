<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-card {
            background: #fff;
            padding: 60px 40px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            margin-top: 60px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .container-card h2 {
            margin-bottom: 40px;
            font-weight: 700;
            color: #333;
        }

        .btn-custom {
            width: 100%;
            padding: 18px;
            margin-bottom: 15px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .description {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="container-card">
            <h2>Panel de Administrador</h2>

            <a href="admin/vehicles.php" class="btn btn-primary btn-custom">Gestionar Vehicles</a>
            <p class="description">Aquí nos encargamos de revisar, publicar, editar y eliminar los coches disponibles en nuestro sistema.</p>

            <a href="admin/adminClients.php" class="btn btn-success btn-custom">Gestionar Clients</a>
            <p class="description">En esta sección podemos ver, añadir o modificar la información de nuestros clientes registrados.</p>

            <a href="admin/adminLloguers.php" class="btn btn-warning btn-custom">Gestionar Lloguers</a>
            <p class="description">Aquí gestionamos los alquileres: revisar reservas, actualizar estados y controlar el historial de lloguers.</p>

            <a href="index.php" class="btn btn-primary btn-custom">Pagina Principal</a>
            <p class="description">Vuelve a la pagina principal.</p>

            <a href="logout.php" class="btn btn-danger btn-custom">Cerrar Sesión</a>
            <p class="description">Finaliza tu sesión de administrador de manera segura.</p>
        </div>
    </div>
</body>
</html>