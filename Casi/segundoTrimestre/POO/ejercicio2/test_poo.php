<?php

require_once "dataBase.php";

$dataBase = new Database();

$conexion = $dataBase->conectar();

if($conexion){
    echo "conexion exitosa";
}else{
    echo "conexion fallida";
}

?>