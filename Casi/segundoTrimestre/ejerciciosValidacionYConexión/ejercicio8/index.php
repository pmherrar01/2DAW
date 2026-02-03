<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>iniciar sesion</h1>

    <?php

    if (isset($_GET["userEncontrado"]) && $_GET["userEncontrado"] == "false" ) {
        echo "<h2 style='color: red;font-weight: bold;'> Usuario no encontrado </h2>";
    }

    if (isset($_GET["passwordEncontrada"] ) && $_GET["passwordEncontrada"] == "false") {
        echo "<h2 style='color: red;font-weight: bold;'> Contraseña incorecta </h2>";
    }

    if (isset($_GET["iniciado"]) && $_GET["iniciado"] == "false") {
        echo "<h2 style='color: red; font-weight: bold;'>Inicia sesion primero!!</h2>";
    }

    if(isset($_GET["cerrar"]) && $_GET["cerrar"] == "true"){
        echo "<h2 style='color: brown; font-weight: bold;'>Sesión cerrada</h2>";
    }

    ?>

    <form action="login.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario"><br> <br>
        <label for="contrasena">Contraseña</labe l>
        <input type="password" name="contrasena" id="contrasena">
        <input type="submit">
        
    </form>
</body>
</html> 