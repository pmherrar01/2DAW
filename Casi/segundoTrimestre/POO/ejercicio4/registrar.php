<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Registrar</h1>

<h2 style='color: red;font-weight: bold;'>
    <?php 
    if(isset($_GET["registro"]) && $_GET["registro"] == "false"){
        echo "Registro fallido intentelo de nuevo";
    }
    ?>

</h2>

    <form action="procesarRegistro.php" method="post">
        <label for="nombre usuario">Nombre Usuario</label>
        <input type="text" name="nombreUsuario"><br><br>
                <label for="contrasena">Contraseña</label>
        <input type="password" name="password"><br><br>

        <button type="submit">Registrarte</button>
        
    </form>
</body>
</html>