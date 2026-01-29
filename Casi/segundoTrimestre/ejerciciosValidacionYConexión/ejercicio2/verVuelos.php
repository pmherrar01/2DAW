<?php

require_once "./conexion.php";

$idCiudad = 1;


try {

    if(filter_var($idCiudad, FILTER_VALIDATE_INT) != false){

    $sql = "SELECT * from vuelo WHERE id_ciudadorigen = :idCiudad"   ;
    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([
        ":idCiudad" => $idCiudad
    ]);

    while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        echo "Numero de plaza" . $fila["n_plazas"] . ", fecha del vuelo: " . $fila["fecha_vuelo"] . "<br>";
    }

    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>