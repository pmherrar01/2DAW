<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php?error=true");
    exit;
}

if ($_SESSION["user"]["rol"] != 1) {
    header("Location: inicio.php?rol=false");
    exit;
}

$idUsu = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="gestion.php?accion=cambiarPass" method="POST">
        <label for="">Contraseña nueva:</label>
        <input type="password" name="contrasenaNueva"><br>
        <input type="hidden" name="idUsu" value="<?php echo $idUsu ?>">
        <button type="submit">Cambiar</button>
    </form>
</body>

</html>