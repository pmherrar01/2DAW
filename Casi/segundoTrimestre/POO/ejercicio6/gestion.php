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
$idRol = isset($_GET["idRol"]) ? $_GET["idRol"] : 0;




switch ($accion) {
    case 'cambiarRol':
        if (!empty($id) && $id != 0 && !empty($idRol) && $idRol != 0) {
            if ($user->editarUsuario($id, $idRol)) {
                header("Location: admin.php?cambioRol=true");
                exit;
            } else {
                header("Location: admin.php?cambioRol=false");
                exit;
            }
        } else {
            header("Location: admin.php?cambioRol=false");
            exit;
        }
    case 'borrar':
        if (!empty($id) && $id != 0) {
            if ($user->borrarUsuario($id)) {
                header("Location: admin.php?borrado=true");
                exit;
            } else {
                header("Location: admin.php?borrado=false");
                exit;
            }
        } else {
            header("Location: admin.php?borrado=false");
            exit;
        }
    case 'cambiarPass':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $contrasenaNueva = $_POST["contrasenaNueva"];
            $idUsuContrasenaNueva = $_POST["idUsu"];

            if ($user->actualizarContrasena($idUsuContrasenaNueva, $contrasenaNueva)) {
                header("Location: admin.php?cambioPass=true");
                exit;
            } else {
                header("Location: admin.php?cambioPass=false");
                exit;
            }
        }
        header("Location: admin.php?cambioPass=false");
        exit;

    default:
        header("Location: index.php?error=true");
        exit;
}
