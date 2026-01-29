<?php
    $host = "localhost";
    $dbName = "agencia_vuelos";
    $user = "root";
    $password = "";

    $dns= "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

    try {
        $conexion = new PDO($dns, $user, $password);

        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       // echo "!Conexion realizada con exito¡";
    } catch (PDOException $e) {
        echo "Error de conexion: " . $e->getMessage();
    }
?>