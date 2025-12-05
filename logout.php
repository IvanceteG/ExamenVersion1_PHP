<?php
// Carpeta temporal dentro del proyecto (asegúrate de que exista y tenga permisos)
session_save_path(__DIR__ . '/tmp_sessions');

if (!is_dir(__DIR__ . '/tmp_sessions')) {
    mkdir(__DIR__ . '/tmp_sessions', 0777, true);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = [];
session_destroy();

header("Location: login.php");
exit();
