<?php

session_start();


if (!isset($_SESSION["user"])) {
    header("Location: index.php?error=true");
    exit;
}

if ($_SESSION["user"]["rol"] != 1) {
    header("Location: inicio.php?rol=false");
    exit;
}


require_once "user.php";
require_once "dataBase.php";

$db = new DataBase();
$user = new User($db->conectar());

$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";

$id = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;
$idRol = isset($_GET[""]) ? $_GET[""] : 0;



if (!empty($id) && $id != 0 && !empty($idRol) && $idRol != 0) {
    switch ($accion) {
        case 'cambiarRol':
            if ($user->editarUsuario($id, $idRol)) {
                header("Location: admin.php?cambioRol=true");
                exit;
            } else {
                header("Location: admin.php?cambioRol=false");
                exit;
            }
        case 'borrar':
            if ($user->borrarUsuario($id)) {
                header("Location: admin.php?borrado=true");
                exit;
            } else {
                header("Location: admin.php?borrado=false");
                exit;
            }
        case 'cambiarPass':
            exit;

        default:
            header("Location: index.php?error=true");
            exit;
    }
}


