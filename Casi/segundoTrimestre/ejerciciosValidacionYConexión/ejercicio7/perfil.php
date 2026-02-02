<?php
session_start();

// EL SEGURATA: Si no hay usuario en la sesión, lo mandamos al login
if (!isset($_SESSION['user'])) {
    header("Location: index.html"); // O index.html, lo que uses
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
</head>
<body>

    <h1>Cambiar Contraseña</h1>
    <p>Usuario conectado: <strong><?php echo $_SESSION['user']; ?></strong></p>

    <form action="cambiarContrasena.php" method="POST">
        
        <label for="antigua">Contraseña Actual:</label><br>
        <input type="text" name="password" id="password">
        <br><br>

        <label for="nueva">Nueva Contraseña:</label><br>
        <input type="text" name="newPassword" id="newPassword">
        <br><br>

        <input type="submit" value="Cambiar Contraseña">

    </form>

    <br>
    <hr>
    <a href="logout.php">Cerrar Sesión</a>

</body>
</html>