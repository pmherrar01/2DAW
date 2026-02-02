<?php

$host = "localhost";
$dbName = "agencia_vuelos";
$user = "root";
$password = "";

$dns = "mysql:host=$host;dbaname=$dbName;charset=utf8mb4";

try {

    $conexion = new PDO($dns, $user, $password);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e-> getMessage();
}

?>