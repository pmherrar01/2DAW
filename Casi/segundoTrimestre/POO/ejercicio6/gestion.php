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
require_once "vuelo.php";

$db = new DataBase();
$user = new User($db->conectar());
$vuelo = new Vuelo($db->conectar());

$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";

$id = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;
$idRol = isset($_GET["idRol"]) ? $_GET["idRol"] : 0;
$fechaVuelo = isset($_POST["fechaVuelo"]) ? $_POST["fechaVuelo"] : "";
$numPlazas = isset($_POST["nPlazas"]) ? $_POST["nPlazas"] : 0;
$idCiudadOrigen = isset($_POST["idCiudadOrigen"]) ? $_POST["idCiudadOrigen"] : 0;
$idCiudadDestino = isset($_POST["idCiudadDestino"]) ? $_POST["idCiudadDestino"] : 0;

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

    case 'nuevoVuelo':
        if (!empty($fechaVuelo) && $fechaVuelo != "" && !empty($numPlazas) && $numPlazas != 0 && !empty($idCiudadOrigen) && $idCiudadOrigen != 0 && !empty($idCiudadDestino) && $idCiudadDestino != 0) {

        $vuelo->setNPlazas($numPlazas);
            $vuelo->setFechaVuelo($fechaVuelo);
            $vuelo->setIdCiudadOrigen($idCiudadOrigen);
            $vuelo->setIdCiudadDestino($idCiudadDestino);

            if ($vuelo->crearVuelo()) {
                header("Location: admin.php?anadirVuelo=true");
                exit;
            } else {
                header("Location: admin.php?anadirVuelo=false");
                exit;
            }
        } else {
            header("Location: admin.php?anadirVuelo=false");
            
            exit;
        }
        exit;
    default:
        header("Location: index.php?error=true");
        exit;
}
