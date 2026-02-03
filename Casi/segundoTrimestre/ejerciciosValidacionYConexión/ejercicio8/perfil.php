<?php

session_start();

if (isset($_SESSION["user"])) {
};



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <style>
        table{
            padding: 10px;
            border-radius: 10px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <h1> <?= $_SESSION["user"] ?> </h1>
    <p>Usuario conectado: <strong><?php echo $_SESSION['user']; ?></strong></p>

    <table border="1px">
        <tr>
            <td>cambiar contraseña</td>
            <td>Cerrar Sesion</td>
            <td>Borar Cuenta</td>
        </tr>
        <tr>
            <td>
                <form action="cambiarContrasena.php" method="POST">

                    <label for="antigua">Contraseña Actual:</label><br>
                    <input type="text" name="password" id="password">
                    <br><br>

                    <label for="nueva">Nueva Contraseña:</label><br>
                    <input type="text" name="newPassword" id="newPassword">
                    <br><br>

                    <input type="submit" value="Cambiar Contraseña">

                </form>
            </td>
            <td><a href="logout.php">SALIR</a></td>
            <td><a href="baja.php">DAR DE BAJA</a></td>
        </tr>
    </table>
    <br>
    <hr>

</body>

</html>