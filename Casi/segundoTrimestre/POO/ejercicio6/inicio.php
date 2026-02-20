<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php?error=true");
    exit;
}

$usuarioLogeado = $_SESSION["user"];

$mensajeRol = "";

if (isset($_GET["rol"]) && $_GET["rol"] == "false") {
    $mensajeRol = "❌ Error: No tienes privilegios de administrador para entrar ahí.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> BIENVENIDO <?php echo $usuarioLogeado["nombreUser"]; ?> </h1>

<h2 style="color: red;"><?php echo $mensajeRol; ?></h2>

    <a href="admin.php">Administracion</a>
    <a href="cerrarSesion.php">Cerrar Sesion</a>
</body>

</html>