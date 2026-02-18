<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 style='color: red;font-weight: bold;'>
    <?php 
    if($_GET["error"] && isset($_GET["error"]) == "true"){
         echo " Usuario no encontrado";
         } 
    
    ?>

</h2>

    <form action="validarLogin.php" method="post">
        <label for="nombre usuario">Nombre Usuario</label>
        <input type="text" name="nombreUsuario"><br><br>
                <label for="contrasena">Contraseña</label>
        <input type="password" name="password"><br><br>

        <button type="submit">Entrar</button>
        
    </form>
</body>
</html>