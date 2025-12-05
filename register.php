<?php
@session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $rol = 'client';
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO clients (name,email,password,rol) VALUES (?,?,?,'client')");
    $stmt->bind_param("sss",$name,$email,$pass_hash);
    if($stmt->execute()) $success = "Registro correcto. <a href='login.php'>Inicia sesión</a>.";
    else $error = "Error: ".$stmt->error;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro RentBox</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: #f5f5f5;
        font-family: "Roboto", Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        padding: 0;
        color: #202124;
    }

    .container-card {
        background: white;
        width: 360px;
        padding: 40px 35px;
        border-radius: 8px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.15);
        text-align: center;
        animation: fadeIn 0.4s ease;
    }

    h2 {
        font-weight: 500;
        margin-bottom: 10px;
        font-size: 1.8rem;
    }

    p {
        color: #5f6368;
        margin-bottom: 25px;
        font-size: 0.95rem;
    }

    input.form-control {
        border-radius: 4px;
        border: 1px solid #dadce0;
        padding: 12px;
        width: 100%;
        margin-bottom: 15px;
        font-size: 0.95rem;
        transition: all 0.2s;
        background: #fff;
    }

    input.form-control:focus {
        border: 1px solid #1a73e8;
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
        transition: 0.2s;
    }

    .btn-custom:hover {
        background: #1669c1;
    }

    .alert-danger {
        border-radius: 4px;
        padding: 8px;
        font-size: 0.85rem;
    }

    a {
        color: #1a73e8;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
    }

    a:hover {
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>
<div class="container text-center">
    <div class="container-card">
        <h2>Registrar-se</h2>
        <?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <?php if($success) echo "<div class='alert alert-success'>$success</div>"; ?>
        <form method="POST">
            <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" required>
            <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
            <input type="password" class="form-control mb-3" name="password" placeholder="Contraseña" required>
            <button type="submit" class="btn btn-danger btn-custom">Registrar</button>
        </form>
        <p class="mt-3">Ja tens compte? <a href="login.php">Iniciar Sessió</a></p>
    </div>
</div>
</body>
</html>