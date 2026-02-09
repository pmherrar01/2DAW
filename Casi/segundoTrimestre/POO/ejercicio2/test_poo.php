<?php

require_once "dataBase.php";
require_once "user.php";

$dataBase = new Database();

$conexion = $dataBase->conectar();

if($conexion){
    $user = new Usuario($conexion);

    $user->setUserName("Usuario POO2");
    $user->setPassword("12345");
    if($user->registrar()){
        echo "Insertado corectamente";
    }else{
        echo "Error no se a podido insertar";
    }

}else{
    echo "conexion fallida";
}

?>