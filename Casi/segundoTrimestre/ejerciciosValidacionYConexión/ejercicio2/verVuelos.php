<?php

require_once "./segundoTrimestre/conexion.php";

$idCiudad = 1;


try {

    if(filter_var($idCiuduad, FILTER_VALIDATE_INT) != false){

    $sql = "SELECT * from vuelo WHERE id_ciudadorigen = :idCiudad"   ;
    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([
        ":idCiudad" => $idCiudad
    ]);

    }

} catch (\Throwable $th) {
    //throw $th;
}

?>