<?php

session_start();

require_once "user.php";
require_once "dataBase.php";

$db = new DataBase();
$user = new User($db->conectar());

$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";

$id = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;
$idRol = isset($_GET[""]) ? $_GET[""] : 0;

switch ($accion) {
    case 'cambiarRol':
        
        exit;
    case 'borrar':
        exit;
    case 'cambiarPass':
        exit;

    default:
        header("Location: index.php?error=true");
        exit;
}
