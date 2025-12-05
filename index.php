<?php
@session_start();

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] === 'admin') {
        header("Location: adminPanel.php");
        exit();
    } else {
        header("Location: clientPanel.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentBox | Gestión de Vehículos y Locales</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #004aad, #0073ff);
            min-height: 100vh;
            color: #fff;
        }

        .hero {
            padding-top: 10vh;
            padding-bottom: 8vh;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
            opacity: 0.9;
        }

        .card-box {
            background: #ffffff;
            border-radius: 15px;
            padding: 35px 25px;
            margin: 3rem auto;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.15);
            color: #333;
            max-width: 600px;
            text-align: center;
        }

        .btn-custom {
            padding: 12px 20px;
            font-size: 1.1rem;
            border-radius: 8px;
            margin: 10px 5px;
            width: 200px;
        }

        .advantages {
            margin-top: 5rem;
            margin-bottom: 5rem;
        }

        .advantages h2 {
            font-weight: 700;
            font-size: 2rem;
            color: #ffffff;
            text-align: center;
            margin-bottom: 2.5rem;
        }


        .table-responsive {
            overflow-x: auto;
        }

        .table {
            background: #ffffff;
            color: #333;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.15);
            margin: 0 auto;
            max-width: 900px;
        }

        .table th,
        .table td {
            padding: 20px;
            text-align: center;
            font-size: 1rem;
        }

        .table tbody tr:hover {
            background-color: #f1f5f9;
            transition: background-color 0.3s;
        }

        footer {
            background: #003974;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        footer a {
            color: #ffe24b;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container hero">
        <h1>Bienvenido a <span style="color: #ffe24b;">RentBox</span></h1>
        <p>La plataforma inteligente para gestionar tu flota de coches y espacios de alquiler.</p>
    </div>

    <div class="card-box">
        <h3>Accede a tu cuenta</h3>
        <p>Controla tus vehículos, locales, reservas y mucho más.</p>
        <a href="adminPanel.php" class="btn btn-warning btn-custom">Panel de Administrador</a>
        <a href="logout.php" class="btn btn-outline-danger btn-custom">Cerrar Sesión</a>
        <a href="login.php" class="btn btn-primary btn-custom">Iniciar Sesión</a>
        <a href="register.php" class="btn btn-outline-danger btn-custom">Registrarse</a>
    </div>

    <div class="container advantages">
        <h2>¿Por qué trabajar con RentBox?</h2>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Ventaja</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Gestión centralizada</td>
                        <td>Administra toda tu flota y reservas desde un solo panel.</td>
                    </tr>
                    <tr>
                        <td>Seguridad</td>
                        <td>Acceso seguro con roles de usuario y contraseñas encriptadas.</td>
                    </tr>
                    <tr>
                        <td>Control de disponibilidad</td>
                        <td>Visualiza en tiempo real qué vehículos están disponibles.</td>
                    </tr>
                    <tr>
                        <td>Historial completo</td>
                        <td>Consulta el historial de reservas de cada cliente fácilmente.</td>
                    </tr>
                    <tr>
                        <td>Responsive</td>
                        <td>Accede desde cualquier dispositivo, ya sea móvil, tablet o PC.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> RentBox Mobility. Todos los derechos reservados.</p>
        <p>
            <a href="#">Política de Privacidad</a> |
            <a href="#">Términos y Condiciones</a> |
            <a href="#">Contacto</a>
        </p>
    </footer>
</body>
</html>