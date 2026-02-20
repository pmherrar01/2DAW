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

require_once "user.php";
require_once "dataBase.php";

$idUserDelete = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;

$db = new DataBase();
$userDelete = new User($db->conectar());

if(!empty($idUserDelete) && $idUserDelete != 0){
    if( $userDelete->borrarUsuario($idUserDelete)){
    header("Location: admin.php?borrado=true");
    exit;
    }
}

?>