<?php

session_start();

$idUsuario = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;

$idRol = isset($_GET["idRol"]) ? $_GET["idRol"] : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Que deseas hacer?</h1>
    <h2> <?php echo " <a href='gestion.php?accion=borrar&idUsu=" . $idUsuario . "'>Borrar Usuario</a>" ?></h2>
    <h2> <?php echo " <a href='gestion.php?accion=cambiarRol&idUsu=" . $idUsuario . "&idRol=" . $idRol . "'>Cambiar Rol</a>" ?></h2>
        <h2> <?php echo " <a href='cambiarPassword.php?accion=cambiarPass&idUsu=" . $idUsuario . "'>Cambiar contraseña</a>" ?></h2>
</body>
</html>