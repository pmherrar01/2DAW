<?php

$idPasajero = isset($_POST["idPasajero"]) ?  trim($_POST["idPasajero"]) : "";
$correoPasajero = isset($_POST["correoPasajero"]) ?  trim($_POST["correoPasajero"]) : "";

if (filter_var($idPasajero, FILTER_VALIDATE_INT) != false && filter_var($correoPasajero, FILTER_VALIDATE_EMAIL) != false) {

    require_once "./segundoTrimestre/conexion.php";
    
} else {
    echo "Los datos introducidos no son validos. :(";
}
