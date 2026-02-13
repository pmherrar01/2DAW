<?php

require_once "dataBase.php";
require_once "user.php";

$db = new DataBase();

$conexion = $db->conectar();

$user = new Usuario($conexion);


if($conexion){

    $user -> setUserName("pruebapoo2");
    $user  -> setPassword("pruebapoo2");

    if($user->login()){
        echo "Bienvenido de nuevo, tu id es: " . $user->getId() . " y tu rol es: " . $user->getIdRol();
    }else{
        echo "Error a intentar iniciar sesion";
    }
    

}else{
    echo $e;
}


?>