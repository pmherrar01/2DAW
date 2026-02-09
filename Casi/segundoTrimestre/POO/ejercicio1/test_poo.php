<?php

require_once "database.php";

$dataBase = new Database();

$conexion = $dataBase->conectar();

if($conexion){
    echo "Conexion realizada con exito";
}else{
    echo "Conexion fallida";
}

?>