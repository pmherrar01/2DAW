<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
 $hola = "Hola que deseas hacer?"; 
 $error = "PRIMERO DEBES REGISTRARTE O INICIAR SESION";
 ?>
    <h1>
        <?php 
    if(isset($_GET["error"]) && $_GET["error"] == true){
            echo $error;
        }else{
            echo $hola;
        }
    ?>
    </h1>

    <table border="solid 1px">
        <tr>
            <td><a href="iniciarSesion.php">Iniciar sesion</a> </td>
            <td><a href="registrar.php">Registrar</a></td>
        </tr>
    </table>
</body>
</html>