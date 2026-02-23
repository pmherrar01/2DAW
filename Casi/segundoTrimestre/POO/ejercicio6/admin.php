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
$adminUser = new User($db->conectar());
$vuelo = new Vuelo($db->conectar());

$listaUsuarios = $adminUser->obtenerTodosUsuarios();
$listaVuelos = $vuelo->obtenerVuelos();
$listaCiudades = $vuelo->obtenerCiudades();

$mensajeBorrado = "";
$mensajeCambioRol = "";
$mensajeCambioPass = "";
$mensajeVuelo = "";

if (isset($_GET["borrado"]) && $_GET["borrado"] == "true") {
    $mensajeBorrado = "Usuario borrado correctamente";
}
if (isset($_GET["borrado"]) && $_GET["borrado"] == "false") {
    $mensajeBorrado = "Fallo al borrar el usuario";
}

if (isset($_GET["cambioRol"]) && $_GET["cambioRol"] == "true") {
    $mensajeCambioRol = "Cambio de rol realizado correctamente";
}


if (isset($_GET["cambioRol"]) && $_GET["cambioRol"] == "false") {
    $mensajeCambioRol = "Error al cambiar el rol";
}

if (isset($_GET["cambioPass"]) && $_GET["cambioPass"] == "false") {
    $mensajeCambioPass = "Error al cambiar la contraseña";
}
if (isset($_GET["cambioPass"]) && $_GET["cambioPass"] == "true") {
    $mensajeCambioPass = "Contraseña cambiada";
}

if (isset($_GET["anadirVuelo"]) && $_GET["anadirVuelo"] == "true") {
    $mensajeVuelo = "vuelo añadido";
}

if (isset($_GET["anadirVuelo"]) && $_GET["anadirVuelo"] == "false") {
    $mensajeVuelo = "El vuelo no se a podido añadir";
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
</head>

<body>
    <h1>👑 Bienvenido al Panel de Control Supremo, <?php echo $_SESSION["user"]["nombreUser"] ?></h1>
    <p>Solo los usuarios con rol 1 pueden leer este mensaje secreto.</p>

    <a href="inicio.php">Volver a Inicio</a>

    <h2>Lista de Usuarios Registrados</h2>

    <h2 style="color: green;"> <?php echo $mensajeBorrado ?></h2>

    <h2 style="color: green;"> <?php echo $mensajeCambioRol  ?> </h2>
    <h2 style="color: green;"> <?php echo $mensajeCambioPass  ?> </h2>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($listaUsuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario["id_usuario"] . "</td>";
                echo "<td>" . $usuario["username"] . "</td>";
                if ($usuario["id_rol"] == 1) {
                    $mensajeRol = "Admin";
                } else {
                    $mensajeRol = "Usuario Normal";
                }
                echo "<td>" . $mensajeRol . "</td>";
                echo "<td> <a href='gestionarUsuario.php?idUsu=" . $usuario["id_usuario"] . "&idRol=" . $usuario["id_rol"] .  "'>Gestionar usuario</a> </td>";
                echo "</tr>";
            }
            ?>



        </tbody>


    </table>
    <br><br>
    <hr>



    <h2>Lista de vuelos</h2>

        <h2 style="color: green;"> <?php echo $mensajeVuelo  ?> </h2>

    <table border="1" cellpadding="10">
        <thead>
            <th>ID Vuelo</th>
            <th>Fecha vuelo</th>
            <th>Numero de plazas</th>
            <th>Ciudad Origen</th>
            <th>Ciudad destino</th>

        </thead>
        <tbody>
            <?php
            foreach ($listaVuelos as $vuelo) {
                echo "<tr>";
                echo "<td>" . $vuelo["id_vuelo"] . "</td>";
                echo "<td>" . $vuelo["fecha_vuelo"] . "</td>";
                echo "<td>" . $vuelo["n_plazas"] . "</td>";
                echo "<td>" . $vuelo["ciudad_origen"] . "</td>";
                echo "<td>" . $vuelo["ciudad_destino"] . "</td>";

                echo "</tr>";
            }
            ?>
        </tbody>

    </table>

    <br><br>

    <h2>✈️ Añadir Nuevo Vuelo</h2>

<form action="gestion.php?accion=nuevoVuelo" method="POST">
    
    <label for="nPlazas">Número de Plazas:</label>
    <input type="number" name="nPlazas" min="1" required><br><br>

    <label for="fechaVuelo">Fecha del Vuelo:</label>
    <input type="date" name="fechaVuelo" required><br><br>

    <label for="idCiudadOrigen">Ciudad de Origen:</label>
    <select name="idCiudadOrigen" required>
        <option value="">-- Selecciona Origen --</option>
        <?php
        foreach ($listaCiudades as $ciudad) {
            echo "<option value='" . $ciudad["id_ciudad"] . "'>" . $ciudad["nombre"] . "</option>";
        }
        ?>
    </select><br><br>

    <label for="idCiudadDestino">Ciudad de Destino:</label>
    <select name="idCiudadDestino" required>
        <option value="">-- Selecciona Destino --</option>
        <?php
        foreach ($listaCiudades as $ciudad) {
            echo "<option value='" . $ciudad["id_ciudad"] . "'>" . $ciudad["nombre"] . "</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Programar Vuelo</button>
</form>
</body>

</html>