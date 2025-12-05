<?php @session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $stmt = $mysqli->prepare("SELECT id, name, email, password, rol FROM clients WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['rol'] = $user['rol'];
            if ($user['rol'] === 'admin') {
                header("Location: adminPanel.php");
            } else {
                header("Location: clientPanel.php");
            }
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentBox Mobility</title>
    <style>
        body {
            background: #f5f5f5;
            font-family: "Roboto", Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container-card {
            background: white;
            width: 360px;
            padding: 40px 35px;
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h2 {
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 1.8rem;
        }

        input.form-control {
            border-radius: 4px;
            border: 1px solid #dadce0;
            padding: 12px;
            width: 100%;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        input.form-control:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 1px #1a73e8;
            outline: none;
        }

        .btn-custom {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            font-weight: 500;
            border: none;
            background: #1a73e8;
            color: white;
            font-size: 1rem;
        }

        .btn-custom:hover {
            background: #1669c1;
        }

        .alert-danger {
            border-radius: 4px;
            padding: 8px;
            font-size: 0.85rem;
            margin-bottom: 15px;
        }

        p a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 500;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container-card">
        <h2>Iniciar Sesión</h2> <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?> 
        <form method="POST" action="index.php"> 
            <input type="email" class="form-control" name="email" placeholder="Email" required> 
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required> 
            <button type="submit" class="btn-custom">Iniciar Sesión</button> </form>
        <p class="mt-3">No tienes cuenta? <a href="register.php">Registrarse</a></p>
    </div>
</body>

</html>