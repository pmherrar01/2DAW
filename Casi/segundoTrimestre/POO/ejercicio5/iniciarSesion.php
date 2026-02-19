<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Iniciar sesion</h1>

<h2 style='color: red;font-weight: bold;'>
    <?php 
    if(isset($_GET["encontrado"]) && $_GET["encontrado"] == "false"){
         echo " Usuario no encontrado";
         }
         
         if(isset($_GET["registro"]) && $_GET["registro"] == "true"){
            echo "Usuario Registrado Corectamente, ahora deves iniciar sesion";
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