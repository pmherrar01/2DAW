<?php
session_start();

// EL SEGURATA: Si no hay usuario en la sesión, lo mandamos al login
if (!isset($_SESSION['user'])) {
    header("Location: index.html"); // O index.html, lo que uses
    exit;
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
    <h1>Bienvenido  <?php echo $_SESSION['user']; ?></h1>

    <?php

    if (isset($_GET['cambio']) && $_GET["cambio"] == "ok") {
        echo "<p style='color: green; font-weight: bold;'>¡Contraseña cambiada correctamente!</p>";
    }

    ?>

    <a href="perfil.php">Cambiar contraseña</a> | <a href="logout.php">Cerrar Sesión</a>
</body>
</html>