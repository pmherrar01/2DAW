<?php

session_start();

if(!isset($_SESSION["user"])){
        header("Location: index.php?error=true");
    exit;
}

if($_SESSION["user"]["rol"] != 1){
        header("Location: inicio.php?rol=false");
    exit;
}

$idUsu = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;
$idRol = isset($_GET["idRol"]) ? $_GET["idRol"] : 0;

require_once "dataBase.php";
require_once "user.php";

$db = new DataBase();
$userChangeRol = new User($db->conectar());

if(!empty($idUsu) && $idUsu != 0){

    if( $userChangeRol->editarUsuario($idUsu, $idRol)){
        header("Location: admin.php?cambioRol=true");
        exit;
    }else{
                header("Location: admin.php?cambioRol=false");
        exit;
    }

   
}


?>