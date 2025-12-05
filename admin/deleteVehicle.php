<?php
@session_start();

require_once '../config.php';

if(!isset($_GET["id"])){
    die("ID no está especificado");
}

$id = $_GET["id"];

$stmt = $mysqli->prepare("DELETE FROM vehicles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: vehicles.php");
exit;