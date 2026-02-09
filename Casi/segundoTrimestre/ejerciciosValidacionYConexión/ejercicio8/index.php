<!-- 
 🗑️ Misión: Eliminar la cuenta de usuario

El objetivo es poner un botón en el portal que, al pulsarlo, borre al usuario de la base de datos y lo eche de la web.

Necesitamos dos pasos.

Paso 1: El Botón de autodestrucción (portal.php)

Esto es fácil. En tu portal.php, añade un enlace (o un botón dentro de un formulario) que diga "Darse de baja" o "Eliminar cuenta". Este enlace debe apuntar a un archivo nuevo: baja.php.

Paso 2: El archivo ejecutor (baja.php)

Este archivo es una mezcla entre tu portal.php (necesita seguridad) y tu logout.php (necesita cerrar sesión).

Tu algoritmo a programar:

Inicio: Arranca la sesión y conéctate a la base de datos.

Seguridad: (Opcional pero recomendable) Verifica que hay alguien logueado.

Recuperar ID: Coge el nombre del usuario de la variable $_SESSION['usuario'] (o como la llamaras al final).

La Sentencia de Muerte (SQL):

Prepara una sentencia SQL usando el verbo DELETE.

La frase es: DELETE FROM usuario WHERE username = :usu

Ejecútala pasando el parámetro del usuario.

Limpieza: Una vez borrado de la base de datos, el usuario ya no existe, así que tienes que destruir su sesión manualmente (igual que hiciste en logout.php). Si no lo haces, se quedará logueado como un fantasma.

Adiós: Redirige a index.html.
-->


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

        if (isset($_GET["baja"]) && $_GET["baja"] == "true") {
        echo "<h2 style='color: red;font-weight: bold;'> Sesion borrada </h2>";
    }

    ?>

    <form action="login.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario"><br> <br>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena">
        <input type="submit">
        
    </form>
</body>
</html> 