<?php
$host = 'mysql-ivancetee.alwaysdata.net';
$dbname = 'ivancetee_rentbox';
$username = 'ivancetee';
$password = 'Ivancete@1803';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error){
    die("Error de conexión: " . $mysqli->connect_error);
}