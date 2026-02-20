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
$adminUser = new User($db->conectar());

$listaUsuarios = $adminUser->obtenerTodosUsuarios();

if (isset($_GET["borrado"]) && $_GET["borrado"] == "true") {
    $mensajeBorrado = "Usuario borrado correctamente";
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
</head>

<body>
    <h1>👑 Bienvenido al Panel de Control Supremo, Administrador</h1>
    <p>Solo los usuarios con rol 1 pueden leer este mensaje secreto.</p>

    <a href="inicio.php">Volver a Inicio</a>

    <h2>Lista de Usuarios Registrados</h2>

    <h2 style="color: green;"> <? echo $mensajeBorrado ?></h2>

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
                echo "<td> <a href='borrarUsuario.php?idUsu=" . $usuario["id_usuario"] . "'>Borrar usuario</a> <br> <a href='editarUsuario.php?idUsu=" . $usuario["id_usuario"] . "'>Editar usuario</a> </td>";
                echo "</tr>";
            }
            ?>




        </tbody>
    </table>
</body>

</html>