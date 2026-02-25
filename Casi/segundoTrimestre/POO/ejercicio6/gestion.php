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

// Seteamos los datos
            $vuelo->setNPlazas($numPlazas);
            $vuelo->setFechaVuelo($fechaVuelo);
            $vuelo->setIdCiudadOrigen($idCiudadOrigen);
            $vuelo->setIdCiudadDestino($idCiudadDestino);

            // 1. Creamos el vuelo y recuperamos su ID
            $idVueloCreado = $vuelo->crearVuelo();

            if ($idVueloCreado) {
                // 2. Si el vuelo se creó, vamos a procesar las imágenes
                
                // Verificamos si se han subido imágenes (el input tiene algo)
                if (isset($_FILES['imagenes']) && !empty($_FILES['imagenes']['name'][0])) {
                    
                    $cantidadImagenes = count($_FILES['imagenes']['name']);

                    for ($i = 0; $i < $cantidadImagenes; $i++) {
                        
                        $nombreArchivo = $_FILES['imagenes']['name'][$i];
                        $tipoArchivo = $_FILES['imagenes']['type'][$i];
                        $rutaTemporal = $_FILES['imagenes']['tmp_name'][$i];
                        
                        // Generamos un nombre único para que no se sobrescriban (ej: vuelo_15_foto.jpg)
                        $rutaDestino = "uploads/" . time() . "_" . $nombreArchivo;

                        // Movemos el archivo de la carpeta temporal a nuestra carpeta 'uploads'
                        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                            // Si se movió bien, guardamos la ruta en la BD
                            $vuelo->guardarImagen($idVueloCreado, $rutaDestino);
                        }
                    }
                }

                header("Location: admin.php?anadirVuelo=true");
                exit;
            } else {
                header("Location: admin.php?anadirVuelo=false");
                exit;
            }
        }
        exit;

        case 'subirFotosExistentes':
        // 1. Recogemos el ID del vuelo (viene oculto en el formulario)
        $idVuelo = isset($_POST["idVuelo"]) ? $_POST["idVuelo"] : 0;

        if ($idVuelo != 0 && isset($_FILES['imagenes'])) {
            
            // 2. Bucle para procesar las imágenes (Igual que antes)
            $cantidadImagenes = count($_FILES['imagenes']['name']);

            for ($i = 0; $i < $cantidadImagenes; $i++) {
                $nombreArchivo = $_FILES['imagenes']['name'][$i];
                $rutaTemporal = $_FILES['imagenes']['tmp_name'][$i];

                if ($nombreArchivo != "") {
                    // Nombre único
                    $rutaDestino = "uploads/" . time() . "_" . $nombreArchivo;

                    // Movemos el archivo
                    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        // Guardamos en la BD usando el ID que nos llegó del formulario
                        $vuelo->guardarImagen($idVuelo, $rutaDestino);
                    }
                }
            }
            
            // 3. Volvemos a la página de gestionar fotos para ver el resultado
            header("Location: gestionarFotos.php?idVuelo=" . $idVuelo);
            exit;
        }
        
        header("Location: admin.php");
        exit;

    default:
        header("Location: index.php?error=true");
        exit;
}
