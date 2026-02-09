<?php

session_start();

require_once "./conexion.php";


    if(!isset($_SESSION["user"])){
            header("Location: index.php?iniciado=false");
            exit;
    }

$user = $_SESSION["user"];


try {

    $sql = "DELETE FROM usuario where username = :usu";

    $secuencia = $conexion->prepare($sql);
    $secuencia->execute([":usu" => $user]);

    session_destroy();

    header("Location: index.php?baja=true");

    exit;

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>